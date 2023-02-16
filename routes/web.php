<?php

use App\Http\Controllers\ReleaseController;


use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/release/create',[ReleaseController::class, 'create'])->name('release.create');

