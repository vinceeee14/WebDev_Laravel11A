<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return view('welcome');
});

//view
Route::get('/view', [StudentsController::class, 'index'])->name('std.viewStudents');

//create 
Route :: post('/create-new', [StudentsController::class,'createNewSTD'])->name('std.create');

//Update
Route ::put('/Update/{id}',[StudentsController::class,'UpdateSTD'])->name('std.update');

//Delete
Route :: delete('/Delete/{id}',[StudentsController::class,'DeleteSTD'])->name('std.delete');
