<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\ClientDemande;
use Illuminate\Support\Facades\Auth;

class clientController extends Controller
{
    //
    public function index()
    {
        $medicines = Stock::all();
        return view('client_side.welcome', compact('medicines'));
    }

    public function handleDemande(Request $request)
    {
        $demande = new ClientDemande();
        $demande->demande = $request->medicine;
        $demande->quantity = $request->quantity;
        $demande->user_id = Auth::user()->id;
        $demande->save();

    return redirect()->route('medicines_view')->with('success', 'Demand handled successfully');
    }

}
