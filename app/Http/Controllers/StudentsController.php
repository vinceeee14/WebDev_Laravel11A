<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $students = students::all();
        
        return view('StudentView', compact('students'));
    }

    public function createNewSTD(Request $request)
{
    $request->validate([
        'name' => 'required',
        'age'=> 'required',
        'gender'=> 'required'
    ]);
    $addNewSTD = new Students();
    $addNewSTD->name = $request->name;
    $addNewSTD->age = $request->age;
    $addNewSTD->gender = $request->gender;
    $addNewSTD->save;

    return back()->with('success',value:'Student Added Succesfully!');
    
}
}

