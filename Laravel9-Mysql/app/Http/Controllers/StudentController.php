<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        self::read();
    }


    public function create(Request $request)
    {

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_name' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email|unique:students,email|max:50',
        ]);

        # Avoid Cross Site Scripting Attacks
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }

        Student::create($data);
        return redirect()->route('home')->with('success', 'Student Added Successfully, Thank You!');
    }


    public function read()
    {
        $data = Student::all();
        return view("studentList", ["students" => $data]);
    }

    public function edit($id)
    {
        $data = Student::find($id);
        return view("editStudent", ["student" => $data]);
    }

    public function update(Request $request)
    {

        if(!is_numeric($request->hiddenId)) {
            return redirect()->route('home')->with('danger', 'Sorry!, Something Went Wrong.');
        }

        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_name' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email|unique:students,email,' . htmlspecialchars($request->hiddenId) ,
        ]);


        # Avoid Cross Site Scripting Attacks
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }

        $student = Student::find($request->hiddenId);
        $student->update($data);

        return redirect()->route('home')->with('success', 'Student Updated Successfully, Thank You!');
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('home')->with('success', 'Student Deleted Successfully, Thank You!');
    }
}
