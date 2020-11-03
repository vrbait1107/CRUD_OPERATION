<?php

use App\Http\Controllers\ManageEmployee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('login');
});

Route::view('register', "register");
Route::view("add", "addEmployee");

Route::post("addEmployee", [ManageEmployee::class, "addEmployee"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("register", [AuthController::class, "register"]);
