<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicine;
use App\Models\provider;

class pagesController extends Controller
{
    public function provider(){
        $providers=provider::all();
        return view("pages/providers/index")->with(['providers'=>$providers]);
    }
    
}
