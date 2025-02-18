<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return view('welcome');
});
Route::get('/', [StudentsController::class, 'index']);
