<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return view('auth.login');
});

Route::redirect('/dashboard', 'home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::get('/home', [UserController::class,'index'])->name('home')->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::delete('/home', [UserController::class,'bulkDelete'])->name('users.bulkDelete')->middleware('auth');
