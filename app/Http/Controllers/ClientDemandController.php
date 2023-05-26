<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientDemande;

class ClientDemandController extends Controller
{
    public function index(){
        $demandes = ClientDemande::join('users', 'client_demande.user_id', '=', 'users.id')
        ->select('client_demande.id','client_demande.demande', 'client_demande.quantity', 'users.email', 'users.name','client_demande.created_at')
        ->get();

    return view('pages.clientDemandes.index', ['demandes' => $demandes]);
    }

    public function destroy($id)
{
    $demande = ClientDemande::findOrFail($id);
    $demande->delete();

    return redirect()->route('viewClientDemandes')->with('success', 'Demand deleted successfully');
}
}
