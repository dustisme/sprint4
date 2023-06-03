<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function mainHomepage() {
        return view('homepage');
    }

    public function trainerHomepage() {
        return view('trainerHomepage');
    }
}
