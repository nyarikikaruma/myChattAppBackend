<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->group(function () {

});

Route::group(['middleware' => 'api'], function() {
    Route::post('/register', [AuthController::class, 'register']);
});
