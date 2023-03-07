<?php

use App\Http\Controllers\FilterReleaseController;
use App\Http\Controllers\ReleaseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/releases',[ReleaseController::class, 'index'])->name('releases.index');
Route::get('/releases/create',[ReleaseController::class, 'create'])->name('releases.create');
Route::post('/releases',[ReleaseController::class, 'store'])->name('releases.store');
Route::get('/releases/{id}/edit',[ReleaseController::class, 'edit'])->name('releases.edit');
Route::put('/releases/{id}',[ReleaseController::class, 'update'])->name('releases.update');
Route::get('/releases/{id}',[ReleaseController::class, 'destroy'])->name('releases.destroy');
Route::any('/releases/search',[FilterReleaseController::class, 'search'])->name('releases.search');
// Route::any('/releases/search',[ReleaseController::class, 'search'])->name('releases.search');


// Nota: as rotas podem ter o mesmo nome, desde que tenham verbos diferentes