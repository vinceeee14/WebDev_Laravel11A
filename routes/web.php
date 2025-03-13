<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/web', function () {
    return view('auth.login');
});


Route::middleware([AuthCheck::class])->group(function () {

    //view
Route::get('/', [StudentsController::class, 'index'])->name('std.viewStudents');

//create 
Route :: post('/create-new', [StudentsController::class,'createNewSTD'])->name('std.create');

//Update
Route ::put('/update/{id}',[StudentsController::class,'updateSTD'])->name('std.update');

//Delete
Route :: delete('/delete/{id}',[StudentsController::class,'deleteSTD'])->name('std.delete');


});




// Auth
Route::get('/login', [AuthController::class, 'index'])->name(('auth.index'));
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');