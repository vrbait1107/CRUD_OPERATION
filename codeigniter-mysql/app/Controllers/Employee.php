<?php

namespace App\Controllers;

class Employee extends BaseController
{

    /*
    TITLE: CONSTRUCTOR,
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EmployeeModel', 'employee');
        $session = \Config\Services::session();
    }

    /*
    TITLE: READ OPERATION,
     */

    public function view()
    {

        $data["session"] = $session;
        $employeeArray = $this->employee->getEmployee();

        $data["employees"] = $employeeArray;
        return view("viewEmployee", $data);
    }

    /*
    TITLE: CREATE OPERATION,
     */

    public function add()
    {

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

            if ($input) {

                # Sanitizing Input for Avoiding XSS Attack.
                $name = htmlspecialchars($this->request->getPost("name"));
                $email = htmlspecialchars($this->request->getPost("email"));
                $mobileNumber = htmlspecialchars($this->request->getPost("mobileNumber"));
                $address = htmlspecialchars($this->request->getPost("address"));
                $gender = htmlspecialchars($this->request->getPost("gender"));

                $this->employee->save([
                    "name" => $name,
                    "email" => $email,
                    "mobileNumber" => $mobileNumber,
                    "address" => $address,
                    "gender" => $gender,
                ]);

                $this->session->setFlashdata("success", "Record added successfully");

                return redirect()->to("/");

            } else {
                $data["validation"] = $this->validator;
            }
        }

        return view("addEmployee", $data);
    }

    /*
    TITLE: EDIT OPERATION
     */

    public function edit($id)
    {

        # Sanitizing Input for Avoiding XSS Attack.
        $id = htmlspecialchars($id);

        helper("form");
        $employee = $this->employee->getRow($id);

        if (empty($employee)):
            $this->session->setFlashdata("error", "Record Not Found");
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

            if ($input) {

                # Sanitizing Input for Avoiding XSS Attack.
                $id = htmlspecialchars($id);
                $name = htmlspecialchars($this->request->getPost("name"));
                $email = htmlspecialchars($this->request->getPost("email"));
                $mobileNumber = htmlspecialchars($this->request->getPost("mobileNumber"));
                $address = htmlspecialchars($this->request->getPost("address"));
                $gender = htmlspecialchars($this->request->getPost("gender"));

                $this->employee->update($id, [
                    "name" => $name,
                    "email" => $email,
                    "mobileNumber" => $mobileNumber,
                    "address" => $address,
                    "gender" => $gender,
                ]);

                $this->session->setFlashdata("success", "Record Updated successfully");
                return redirect()->to("/");

            } else {
                $data["validation"] = $this->validator;
            }

        }

        return view("editEmployee", $data);

    }

    /*
    TITLE: DELETE OPERATION,
     */

    public function delete($id)
    {
        $id = htmlspecialchars($id);

        $employee = $this->employee->getRow($id);

        if (empty($employee)):
            $this->session->setFlashdata("error", "Record Not Found");
            return redirect()->to("/");
        endif;

        $this->employee->delete($id);
        $this->session->setFlashdata("success", "Record Deleted Successfully");
        return redirect()->to("/");

    }

}
