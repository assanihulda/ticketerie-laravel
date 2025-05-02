<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
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
//users
Route::get('/', [EventController::class, 'publicIndex'])->name('events.public');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{event}/participate', [ParticipantController::class, 'store'])->name('events.participate');

// administrateur
Route::get('/admin', [EventController::class, 'index'])->name('events.index');
Route::get('/admin/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
Route::get('/admin/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/admin/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/admin/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/admin/participants', [ParticipantController::class, 'index'])->name('participants.index');




