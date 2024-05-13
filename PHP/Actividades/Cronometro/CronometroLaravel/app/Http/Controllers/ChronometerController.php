<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChronometerController extends Controller
{
    public function index()
    {
        return view('chronometer.index');
    }
}
