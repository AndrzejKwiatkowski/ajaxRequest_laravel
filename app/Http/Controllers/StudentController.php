<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::get();

        return view('student', ['students' => $students]);
    }

    public function store(Request $request) {

        $students = new Student;
        
        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->email = $request->input('email');

        $students->save();
        return $students;
            
    }

    public function update(Request $request, $id) {

        $students = Student::find($id);
        
        $students->name = $request->input('name');
        $students->surname = $request->input('surname');
        $students->email = $request->input('email');

        $students->save();
            
    }
}
