<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ManageEmployee extends Controller
{
    //
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
            return view("addEmployee", ["msg" => "Employee Successfully Saved"]);
        } else {
            return view("addEmployee", ["msg" => "Failed to Save Employee"]);
        }

    }
}
