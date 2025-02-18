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
}
