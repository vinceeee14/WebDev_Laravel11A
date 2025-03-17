<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.index');
});




// Auth login 
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

//Auth register
Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');



Route::middleware([AuthCheck::class])->group(function () {

    //view
    Route::get('/students', [StudentsController::class, 'index'])->name('std.viewStudents');

    //create 
    Route::post('/create-new', [StudentsController::class, 'createNewSTD'])->name('std.create');

    //Update
    Route::put('/update/{id}', [StudentsController::class, 'updateSTD'])->name('std.update');

    //Delete
    Route::delete('/delete/{id}', [StudentsController::class, 'deleteSTD'])->name('std.delete');

    //logout
    Route::get('/logout', [AuthController::class,'logout'])->name('auth.logout');
});

