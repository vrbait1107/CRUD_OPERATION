<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //---------------->>Login

    public function login(Request $req)
    {

        $data = ["username" => $req->username, "password" => $req->password];

        return $data;

    }
}
