<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\UserController;

Route::middleware('auth:sanctum')->group(function () {

  Route::middleware('isSuperuser')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
  });

  //
});
