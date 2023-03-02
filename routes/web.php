<?php

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



// Nota: as rotas podem ter o mesmo nome, desde que tenham verbos diferentes