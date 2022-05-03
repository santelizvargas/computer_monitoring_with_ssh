<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;

Route::view('/','index')->name('home');

Route::resource('computers', ComputerController::class);
