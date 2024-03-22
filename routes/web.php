<?php

use App\Livewire\AddMeeting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('add-meeting', view('meetings.add-meeting'))->middleware('auth');
Route::view('add-meeting', 'meetings.add-meeting')->middleware('auth');

Route::get('notification', [\App\Http\Controllers\DiscordNotification::class, 'notification']);
