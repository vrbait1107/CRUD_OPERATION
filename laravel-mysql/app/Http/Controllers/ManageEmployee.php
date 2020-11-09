<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ManageEmployee extends Controller
{
    # CREATE OPERATION

    public function addEmployee(Request $req)
    {

        $req->validate([
            "name" => "required",
            "email" => "required",
            "etype" => "required",
            "hourlyRate" => "required",
            "totalHour" => "required",
        ]);

        $employee = new Employee();

        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->etype = $req->etype;
        $employee->hourlyRate = $req->hourlyRate;
        $employee->totalHour = $req->totalHour;
        $employee->total = $req->hourlyRate * $req->totalHour;

        if ($employee->save()) {
            return redirect("view");
        } else {
            return view("addEmployee", ["msg" => "Failed to Save Employee"]);
        }

    }

    # READ OPERATION

    public function viewEmployee()
    {
        $data = Employee::all();
        return view("viewEmployee", ["data" => $data]);
    }

    # DELETE OPERATION

    public function deleteEmployee($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return redirect("view");
    }

    # EDIT OPERATION

    public function editEmployee($id)
    {
        $data = Employee::find($id);
        return view("EditEmployee", ["data" => $data]);
    }

    # UPDATE OPERATION

    public function updateEmployee(Request $req)
    {
        $req->validate([
            "name" => "required",
            "email" => "required",
            "etype" => "required",
            "hourlyRate" => "required",
            "totalHour" => "required",
        ]);

        $employee = Employee::find($req->id);
        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->etype = $req->etype;
        $employee->hourlyRate = $req->hourlyRate;
        $employee->totalHour = $req->totalHour;
        $employee->total = $req->hourlyRate * $req->totalHour;

        if ($employee->save()) {
            return redirect("view");
        } else {
            return view("addEmployee", ["msg" => "Failed to Save Employee"]);
        }
    }

}
