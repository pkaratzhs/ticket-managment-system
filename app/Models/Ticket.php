<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'severity',
        'images',
    ];
    protected $casts = [
        'closed_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function isClosed()
    {
        if ($this->closed_at !== null) {
            return true;
        }
        return false;
    }
    public function getURL()
    {
        return URL::to('/tickets/'.$this->id);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('title', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%');
            });
        })->when($filters['ticketStatus'] ?? null, function ($query, $ticketStatus) {
            if ($ticketStatus === 'closed') {
                $query->whereNotNull('closed_at');
            } else {
                $query->whereNull('closed_at');
            }
        });
    }
}
