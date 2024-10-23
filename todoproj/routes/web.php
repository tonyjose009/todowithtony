<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => '/', 'as' => 'tasks.'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
});
