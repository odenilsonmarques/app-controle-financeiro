<?php

use App\Http\Controllers\FilterReleaseController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/releases/dashboard',[DashboardController::class, 'dash'])->name('releases.dash')->middleware('auth');

Route::get('/releases',[ReleaseController::class, 'index'])->name('releases.index')->middleware('auth');

Route::get('/releases/create',[ReleaseController::class, 'create'])->name('releases.create')->middleware('auth');

Route::post('/releases/action',[ReleaseController::class, 'store'])->name('releases.store')->middleware('auth');

Route::get('/releases/{id}/edit',[ReleaseController::class, 'edit'])->name('releases.edit')->middleware('auth');

Route::put('/releases/{id}',[ReleaseController::class, 'update'])->name('releases.update')->middleware('auth');

Route::get('/releases/{id}',[ReleaseController::class, 'destroy'])->name('releases.destroy')->middleware('auth');

Route::any('/releases',[FilterReleaseController::class,'filter'])->name('releases.filter')->middleware('auth');

Route::get('/report',[ReportController::class,'report'])->name('releases.report')->middleware('auth');

Route::fallback(function () {
    return view('notFound.404');

});
// Nota: as rotas podem ter o mesmo nome, desde que tenham verbos diferentes

