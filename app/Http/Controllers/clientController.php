<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;

class clientController extends Controller
{
    //
    public function index()
    {
        $medicines = Stock::all();
        return view('client_side.welcome', compact('medicines'));
    }
}
