<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $students = student::all();
        
        return view('StudentView', compact('students'));
    }

    public function createNewSTD(Request $request) {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);

        $addNewSTD = new student();
        $addNewSTD->name = $request->name;
        $addNewSTD->age = $request->age;
        $addNewSTD->gender = $request->gender;
        $addNewSTD->save();

        return back()->with('success', 'Student Added Successfully!');
    }

    public function updateSTD(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required'
        ]);
    
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->save();
        return redirect()->route('std.viewStudents')->with('success', 'Student updated successfully!');
    }

    public function deleteSTD($id) {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('std.viewStudents')->with('success', 'Student deleted successfully!');
    }
}

