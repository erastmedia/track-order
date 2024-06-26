<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MigrasiController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

Route::get('/migrate-database', [MigrasiController::class, 'migrate']);
Route::view('/migration-progress', 'migration');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/filterall', [HomeController::class, 'filterAll'])->name('filterall');