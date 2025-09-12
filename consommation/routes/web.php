<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VoitureController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\CommentaireController;


Route::get('/', [TrajetController::class, 'index']);
Route::get('/voitures', [VoitureController::class, 'index']);
Route::get('/recharges', [RechargeController::class, 'index']);
Route::get('/commentaires', [CommentaireController::class, 'index']);
