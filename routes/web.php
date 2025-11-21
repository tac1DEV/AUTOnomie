<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrajetController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\ConsommationController;


Route::get('/', [TrajetController::class, 'index'])->name('trajets.index');
Route::get('/trajets/create', [TrajetController::class, 'create'])->name('trajets.create');
Route::post('/trajets/create', [TrajetController::class, 'store'])->name('trajets.store');
Route::get('/trajets/{id}/edit', [TrajetController::class, 'edit'])->name('trajets.edit');
Route::put('/trajets/{id}', [TrajetController::class, 'update'])->name('trajets.update');
Route::delete('/trajets/{id}', [TrajetController::class, 'destroy'])->name('trajets.destroy');

Route::get('/recharges', [RechargeController::class, 'index'])->name('recharges.index');
Route::get('/recharges/create', [RechargeController::class, 'create'])->name('recharges.create');
Route::post('/recharges/create', [RechargeController::class, 'store'])->name('recharges.store');
Route::get('/recharges/{id}/edit', [RechargeController::class, 'edit'])->name('recharges.edit');
Route::put('/recharges/{id}', [RechargeController::class, 'update'])->name('recharges.update');
Route::delete('/recharges/{id}', [RechargeController::class, 'destroy'])->name('recharges.destroy');

Route::get('/consommation', [ConsommationController::class, 'index'])->name('consommation.index');
Route::get('/consommation/{vue}', [ConsommationController::class, 'vue'])
    ->whereIn('vue', ['jour', 'semaine', 'mois', 'annee'])
    ->name('consommation.vue');