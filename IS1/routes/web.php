<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\standController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home'); */

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/master',[MasterController::class,'index']);
Route::get('/masterA',[MasterController::class,'index']);

Route::get('/events',[EventsController::class,'index'])->name('events.index');
Route::get('events/create',[EventsController::class,'create'])->name('events.create');
Route::post('events/store',[EventsController::class,'store'])->name('events.store');
Route::get('/events/{id}/edit', [EventsController::class, 'edit']);
Route::put('/events/{id}/update', [EventsController::class, 'update']);
Route::delete('/events/{id}/soft-delete', [EventsController::class,'softDelete'])->name('events.softDelete');
Route::get('/events/{id}/show', [EventsController::class, 'show']);

Route::get('events/view',[VendorController::class,'index'])->name('vendor.index');

Route::get('/stands', [standController::class, 'index'])->name('stands.index');
// Route to show the form for booking a stand
Route::post('/stands/{stand}/book', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('/bookings/{id}/download', [BookingController::class, 'download'])->name('bookings.download');

Route::get('events/{eventId}/stands/create', [StandController::class, 'create'])->name('stands.create');
Route::post('events/{eventId}/stands/store',[standController::class,'store'])->name('stands.store');
Route::get('stands/{id}/show', [standController::class, 'show'])->name('stands.show');;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
