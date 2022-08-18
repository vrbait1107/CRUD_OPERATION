<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid as UuidUuid;
use Illuminate\Validation\Rule;

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

        $data['uuid'] = UuidUuid::uuid4();

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

    public function edit($uuid)
    {
        $data = Student::where('uuid', $uuid)->first();
        return view("editStudent", ["student" => $data]);
    }

    public function update(Request $request)
    {

        if (!is_string($request->hiddenId) || (preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $request->hiddenId) !== 1)) {
            return redirect()->route('home')->with('danger', 'Sorry!, Something Went Wrong.');
        }


        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'school_name' => 'required',
            'age' => 'required|numeric',
            'email' => Rule::unique('students', 'email')->ignore($request->hiddenId, 'uuid') . '|required|email',
        ]);

       
    
        # Avoid Cross Site Scripting Attacks
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }

        $student = Student::where('uuid', $request->hiddenId);
        $student->update($data);

        return redirect()->route('home')->with('success', 'Student Updated Successfully, Thank You!');
    }

    public function delete($uuid)
    {
        $data = Student::where('uuid', $uuid);
        $data->delete();
        return redirect()->route('home')->with('success', 'Student Deleted Successfully, Thank You!');
    }
}
