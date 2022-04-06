<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementsController;

Route::get('/', function () {
    return 'here';
});

Route::get('/users/{user}/achievements', [AchievementsController::class, 'index']);
