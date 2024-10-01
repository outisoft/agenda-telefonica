<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('agenda', [ContactController::class, 'agenda'])->name('agenda');
Route::get('/agenda/mexico', [AgendaController::class, 'mexico'])->name('agenda.mexico');
Route::get('/agenda/jamaica', [AgendaController::class, 'jamaica'])->name('agenda.jamaica');
Route::get('/agenda/republica-dominicana', [AgendaController::class, 'dominicana'])->name('agenda.dominicana');
Route::get('/agenda/españa', [AgendaController::class, 'españa'])->name('agenda.españa');
Route::get('/agenda/search', [ContactController::class, 'search'])->name('agenda.search');

Route::get('/search/mexico', [AgendaController::class, 'searchMexico'])->name('search.mexico');
Route::get('/search/jamaica', [AgendaController::class, 'searchJamaica'])->name('search.jamaica');
Route::get('/search/dominicana', [AgendaController::class, 'searchDominicana'])->name('search.dominicana');
Route::get('/search/españa', [AgendaController::class, 'searchEspaña'])->name('search.españa');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('destinations', DestinationController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('users', UserController::class);

    Route::get('/home', function () {
        return view('home');
    })->name('home');

});

require __DIR__.'/auth.php';
