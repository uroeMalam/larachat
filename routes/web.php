<?php

use App\Events\NewChatMessage;
use App\Http\Controllers\ChatController;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    // $new = new ChatMessage();
    // // NewChatMessage::dispatch($new);
    // event(new NewChatMessage($new));
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->get('/chat', function () {
        return Inertia::render('Chat/Container');
    })->name('chat');

// Route::middleware('auth:sanctum')->get('/chat/rooms', [ChatController::class, 'rooms']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/chat/rooms', [ChatController::class, 'rooms'])->name('rooms');
    Route::get('/chat/room/{roomId}/messages', [ChatController::class, 'messages'])->name('messages');
    Route::post('chat/room/{roomId}/message', [ChatController::class, 'newMessage'])->name('newMessage');
});