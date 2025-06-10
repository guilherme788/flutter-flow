<?php
use App\Http\Controllers\PresoController;
use App\Http\Controllers\CelaController;

Route::apiResource('celas', CelaController::class);

Route::apiResource('presos', PresoController::class);
