<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return view('welcome');
});

//view
Route::get('/', [StudentsController::class, 'index'])->name('std.viewStudents');

//create 
Route :: post('/create-new', [StudentsController::class,'createNewSTD'])->name('std.create');

//Update
Route ::put('/update/{id}',[StudentsController::class,'updateSTD'])->name('std.update');

//Delete
Route :: delete('/delete/{id}',[StudentsController::class,'deleteSTD'])->name('std.delete');
