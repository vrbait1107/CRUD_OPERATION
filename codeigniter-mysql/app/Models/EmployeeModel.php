<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = "employees";

    protected $allowedFields = ["name", "email", "address", "mobileNumber", "gender"];

    public function getEmployee()
    {
        return $this->orderBy("id", "ASC")->findAll();
    }

    public function getRow($id)
    {
        return $this->where("id", $id)->first();
    }
}
