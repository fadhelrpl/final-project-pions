<?php

use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback');

Route::get('/divisions/{slug}', [DivisionController::class, 'show'])->name('department');

Route::get('/apply', [ApplyController::class, 'index'])->name('apply');
Route::post('/apply', [ApplyController::class, 'store'])->name('apply.store');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'signIn']);

Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'signUp']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/votings', [VoteController::class, 'index'])->name('votings.index');
Route::get('/votings/{voting}', [VoteController::class, 'show'])->name('votings.show');
Route::post('/votings/{voting}/vote', [VoteController::class, 'vote'])->name('votings.vote')->middleware('auth');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');
Route::post('/events/{event}/join', [EventController::class, 'join'])->name('events.join');
