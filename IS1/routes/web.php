<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\standController;
use App\Http\Controllers\VendorController;

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

Route::get('events',[EventsController::class,'index'])->name('events.index');
Route::get('events/create',[EventsController::class,'create'])->name('events.create');
Route::post('events/store',[EventsController::class,'store'])->name('events.store');
Route::get('/events/{id}/edit', [EventsController::class, 'edit']);
Route::put('/events/{id}/update', [EventsController::class, 'update']);
Route::delete('/events/{id}/soft-delete', [EventsController::class,'softDelete'])->name('events.softDelete');
Route::get('/events/{id}/show', [EventsController::class, 'show']);
//Route::post('events/{eventId}/add-stands', [EventsController::class, 'addStand'])->name('events.add-stands');
//Route::post('/events/{eventId}/add-stands', [EventsController::class, 'showAddStandsForm'])->name('events.show-add-stands');

Route::post('events/{eventId}/add-stands', [StandController::class, 'addStand'])->name('stands.add-stands');

Route::get('events/view',[VendorController::class,'index'])->name('vendor.index');
Route::post('{eventId}/stands/create',[standController::class,'create'])->name('stands.create');
Route::post('/events/{eventId}/stands/store',[standController::class,'store'])->name('stands.store');
Route::get('/{eventId}/stands/showstands', [standController::class, 'show']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
