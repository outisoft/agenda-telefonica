<?php

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('contacts', ContactController::class);
});