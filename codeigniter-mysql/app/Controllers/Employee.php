<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Employee extends BaseController
{

    public function view()
    {
        $session = \Config\Services::session();
        $data["session"] = $session;

        $model = new EmployeeModel();
        $employeeArray = $model->getEmployee();
        $data["employees"] = $employeeArray;
        return view("viewEmployee", $data);
    }

    public function add()
    {
        $session = \Config\Services::session();
        helper("form");

        $data = [];

        if ($this->request->getMethod() == "post") {
            $input = $this->validate([
                "name" => "required|min_length[5]",
                'email' => 'required|valid_email',
                'mobileNumber' => 'required|regex_match[/^[0-9]{10}$/]',
                "address" => "required",
                "gender" => "required",
            ]);

            if ($input == true) {
                $model = new EmployeeModel();

                $model->save([
                    "name" => $this->request->getPost("name"),
                    "email" => $this->request->getPost("email"),
                    "mobileNumber" => $this->request->getPost("mobileNumber"),
                    "address" => $this->request->getPost("address"),
                    "gender" => $this->request->getPost("gender"),
                ]);

                $session->setFlashdata("success", "Record added successfully");

                return redirect()->to("/");

            } else {
                $data["validation"] = $this->validator;
            }
        }

        return view("addEmployee", $data);
    }

    public function edit($id)
    {
        $session = \Config\Services::session();
        helper("form");

        $model = new EmployeeModel();

        $employee = $model->getRow($id);

        if (empty($employee)):
            $session->setFlashdata("error", "Record Not Found");
            return redirect()->to("/");
        endif;

        $data = [];
        $data["employee"] = $employee;

        if ($this->request->getMethod() == "post") {
            $input = $this->validate([
                "name" => "required|min_length[5]",
                'email' => 'required|valid_email',
                'mobileNumber' => 'required|regex_match[/^[0-9]{10}$/]',
                "address" => "required",
                "gender" => "required",
            ]);

            if ($input == true) {
                $model = new EmployeeModel();

                $model->update($id, [
                    "name" => $this->request->getPost("name"),
                    "email" => $this->request->getPost("email"),
                    "mobileNumber" => $this->request->getPost("mobileNumber"),
                    "address" => $this->request->getPost("address"),
                    "gender" => $this->request->getPost("gender"),
                ]);

                $session->setFlashdata("success", "Record Updated successfully");

                return redirect()->to("/");

            } else {
                $data["validation"] = $this->validator;
            }
        }

        return view("editEmployee", $data);

    }

    public function delete($id)
    {

        $session = \Config\Services::session();
        $model = new EmployeeModel();
        $employee = $model->getRow($id);

        if (empty($employee)):
            $session->setFlashdata("error", "Record Not Found");
            return redirect()->to("/");
        endif;

        $model->delete($id);
        $session->setFlashdata("success", "Record Deleted Successfully");
        return redirect()->to("/");

    }

}
