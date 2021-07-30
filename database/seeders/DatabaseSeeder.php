<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['email'=>'pkaratzhs@gmail.com','password' => bcrypt('password'),'role' => 'admin']);
        User::factory()->create(['email'=>'pkaratzhs@hotmail.com','password' => bcrypt('password'),'role' => 'client']);
        User::factory()
            ->times(5)
            ->has(Ticket::factory()->times(2))
            ->create();
        $tickets = Ticket::all();

        foreach ($tickets as $ticket) {
            Reply::factory()->times(2)->create([
                'user_id' => $ticket->user->id,
                'ticket_id' => $ticket->id
            ]);
        }
    }
}
