<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginget() {
        return view("login");
    }

    public function loginpost() {
        return view("login");
    }

    public function registget() {
        return view("regist");
    }

    public function registpost() {
        return view("regist");
    }

}
