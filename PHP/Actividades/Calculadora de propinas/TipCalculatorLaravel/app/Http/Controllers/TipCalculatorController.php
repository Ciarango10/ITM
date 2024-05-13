<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipCalculatorController extends Controller
{

    public function index() {

        return view('tipcalculator.index');

    }

    public function calculate(Request $request)
    {
        $billAmount = $request->billAmount;
        $tipPercentage = $request->tipPercentage;

        $tipAmount = ($billAmount * $tipPercentage) / 100;
        $totalAmount = $billAmount + $tipAmount;

        return view('tipcalculator.result', ['tipAmount' => $tipAmount, 'totalAmount' => $totalAmount]);
    }
}
