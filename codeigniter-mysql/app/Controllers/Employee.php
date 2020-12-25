<?php

namespace App\Controllers;

class Employee extends BaseController
{
    public function add()
    {
        $session = \Config\Services::session();
        helper("form");

        $data = [];

        if ($this->request->getMethod() == "post") {
            $input = $this->validate([
                "name" => "required|min_length[5]",
                'email' => 'required|valid_email',
                'mobileNumber' => 'required|length[10]',
                "address" => "required",
                "gender" => "required",
            ]);

            if ($input == true) {
                // Form Validated
            } else {
                $data["validation"] = $this->validator;
            }
        }

        return view("addEmployee", $data);
    }

    public function edit()
    {
        return view("editEmployee");
    }

    public function view()
    {
        return view("viewEmployee");
    }

}
