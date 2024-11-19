<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GagarinController;
use App\Http\Controllers\LunarMissionController;
use Illuminate\Support\Facades\Route;

//Route::get('test', ApiController::class.'@test');
Route::post('registration', AuthController::class . '@registration');
Route::post('authorization', AuthController::class . '@authorization');
Route::get('gagarin-flight', GagarinController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', AuthController::class . '@logout');

    Route::get('lunar-missions', LunarMissionController::class . '@index');
    Route::post('lunar-missions', LunarMissionController::class . '@store');
});
