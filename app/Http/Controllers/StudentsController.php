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
    $addNewSTD->save();

    return back()->with('success',value:'Student Added Succesfully!');
    
}
    public function UpdateSTD(Request $request ){
        $request->validate([
            'name'=> 'required',
            'age'=> 'required',
            'gender'=> 'required'

        ]);

        $student = Students::findOrFail($request->route('id'));

        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->save();

        return redirect()->route('std.viewStudents')->with('success',value:'student updated succesfully');

    }

    Public function DeleteSTD(Request $request){
    $student = students::findOrFail($request->id);
    $student->delete();    
    return redirect()->route('std.viewStudents')->with('success',value:'student deleted succesfully');

    }
}

