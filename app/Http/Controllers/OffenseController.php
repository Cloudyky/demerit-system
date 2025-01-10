<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offense;

class OffenseController extends Controller
{
    //
    public function index(Request $request)
    {
        $offenses = Offense::all();
        return view('offense', compact('offenses'));
    }
}
