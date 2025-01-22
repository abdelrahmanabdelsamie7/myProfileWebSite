<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\API\{AboutController, BlogController, ContactController, EducationController, ServiceController, FooterController, ExperienceController};
Route::middleware(['api'])->prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/getaccount', [AuthController::class, 'getaccount']);
});
Route::apiResource('about', AboutController::class);
Route::apiResource('blog', BlogController::class);
Route::apiResource('contact', ContactController::class);
Route::apiResource('education', EducationController::class);
Route::apiResource('footer', FooterController::class);
Route::apiResource('service', ServiceController::class);
Route::apiResource('experience', ExperienceController::class);
