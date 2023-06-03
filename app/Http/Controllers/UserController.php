<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegistration() {
        return view('userRegistration');
    }

    public function userLogIn() {
        return view('userLogIn');
    }
}
