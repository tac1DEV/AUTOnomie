<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VoitureController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\CommentaireController;


Route::get('/', [TrajetController::class, 'index']);
Route::post('/trajets/create', [TrajetController::class, 'store'])->name('trajets.store');
Route::get('/trajets/{id}/edit', [TrajetController::class, 'edit'])->name('trajets.edit');
Route::put('/trajets/{id}', [TrajetController::class, 'update'])->name('trajets.update');
Route::delete('/trajets/{id}', [TrajetController::class, 'destroy'])->name('trajets.destroy');
Route::get('/voitures', [VoitureController::class, 'index']);
Route::get('/recharges', [RechargeController::class, 'index']);
Route::get('/commentaires', [CommentaireController::class, 'index']);
