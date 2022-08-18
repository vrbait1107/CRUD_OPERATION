<?php

use App\Http\Controllers\StudentController;
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


Route::view("add", "addStudent")->name('add');
Route::get("/", [StudentController::class, "read"])->name('home');
Route::get("edit/{uuid}", [StudentController::class, "edit"])->name('edit')->whereUuid('uuid');
Route::post("create", [StudentController::class, "create"])->name('create');
Route::put("update", [StudentController::class, "update"])->name('update');
Route::get("delete/{uuid}", [StudentController::class, "delete"])->name('delete')->whereUuid('uuid');

