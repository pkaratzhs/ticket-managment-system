<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InviteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require_once __DIR__ . '/fortify.php';
//Admin Group
Route::group([
    'middleware' => ['auth:sanctum','verified']
], function () {
    //Admin Only Routes
    Route::group([
        'middleware' => ['admin']
    ], function () {
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
        Route::get('/invite', [InviteController::class,'index'])->name('invite');
        Route::post('/invite', [InviteController::class,'sendInvite'])->name('invite.send');
    });
    // Client Only Routes
    Route::group([
        'middleware' => ['client']
    ], function () {
        Route::get('/', [HomeController::class,'index'])->name('client');
        Route::get('/tickets/create', [TicketController::class,'create'])->name('tickets.create');
        Route::post('/tickets', [TicketController::class,'store'])->name('tickets.store');
    });
    //General Routes
    Route::get('/tickets/{ticket}', [TicketController::class,'show'])->name('tickets.show');
    Route::post('/tickets/{ticket}/reply', [ReplyController::class,'store'])->name('tickets.reply');
    Route::patch('/tickets/{ticket}/close', [TicketController::class,'closeTicket'])->name('tickets.close');
});
