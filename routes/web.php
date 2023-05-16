<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class,'welcome'])->name('welcome');

Route::get('/announcement/create', [PublicController::class,'announcementCreate'])->middleware('auth')->name('announcementCreate');

Route::get('/categoria/{category}', [PublicController::class,'categoryShow'])->name('categoryShow');

Route::get('/dettaglio/annuncio/{announcement}', [PublicController::class,'showAnnouncement'])->middleware('isAccepted')->name('announcement.show');

Route::get('/tutti/annunci', [PublicController::class,'indexAnnouncement'])->name('announcement.index');

/* rotte revisore */
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');

/* rotta accept */
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

/* rotta reject */
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

/* rotta richiedi revisore */
Route::get('/richiesta/revisore',[RevisorController::class,'becomeRevisor'])->middleware('auth')->name('become.revisor');

/* rotta rendere revisore */
Route::get('/rendi/revisore/{user}',[RevisorController::class,'makeRevisor'])->name('make.revisor');

/* rotta ricerca annuncio */
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');
