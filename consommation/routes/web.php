<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TrajetController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\DashboardController;


Route::get('/', [TrajetController::class, 'index'])->name('trajets.index');
Route::post('/trajets/create', [TrajetController::class, 'store'])->name('trajets.store');
Route::get('/trajets/{id}/edit', [TrajetController::class, 'edit'])->name('trajets.edit');
Route::put('/trajets/{id}', [TrajetController::class, 'update'])->name('trajets.update');
Route::delete('/trajets/{id}', [TrajetController::class, 'destroy'])->name('trajets.destroy');

Route::get('/recharges', [RechargeController::class, 'index'])->name('recharges.index');
Route::get('/recharges/{id}', [RechargeController::class, 'show'])->name('recharges.show');
Route::get('/recharges/create/{id}', [RechargeController::class, 'create'])->name('recharges.create');
Route::post('/recharges/create/{id}', [RechargeController::class, 'store'])->name('recharges.store');
Route::get('/recharges/{id}/edit', [RechargeController::class, 'edit'])->name('recharges.edit');
Route::put('/recharges/{id}', [RechargeController::class, 'update'])->name('recharges.update');
Route::delete('/recharges/{id}', [RechargeController::class, 'destroy'])->name('recharges.destroy');