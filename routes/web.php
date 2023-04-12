<?php

use App\Http\Controllers\FilterReleaseController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/releases/dashboard',[DashboardController::class, 'dash'])->name('releases.dash');
Route::get('/releases',[ReleaseController::class, 'index'])->name('releases.index');

Route::get('/releases/create',[ReleaseController::class, 'create'])->name('releases.create');
Route::post('/releases/action',[ReleaseController::class, 'store'])->name('releases.store');

Route::get('/releases/{id}/edit',[ReleaseController::class, 'edit'])->name('releases.edit');
Route::put('/releases/{id}',[ReleaseController::class, 'update'])->name('releases.update');
Route::get('/releases/{id}',[ReleaseController::class, 'destroy'])->name('releases.destroy');
Route::any('/releases',[FilterReleaseController::class,'filter'])->name('releases.filter');

Route::get('/report',[ReportController::class,'report'])->name('releases.report');



// Nota: as rotas podem ter o mesmo nome, desde que tenham verbos diferentes