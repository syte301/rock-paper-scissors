<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [GameController::class,'index'])->name('game.index');
Route::post('/play', [GameController::class,'play'])->name('game.play');