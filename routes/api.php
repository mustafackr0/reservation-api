<?php

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\ReservationController;

Route::middleware('auth:sanctum')->group(function () {
    // Hotels
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::get('/hotels/{id}/rooms', [HotelController::class, 'rooms']);

    // Rooms
    Route::get('/rooms/{id}', [RoomController::class, 'show']);

    // Reservations
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'cancel']);
});
