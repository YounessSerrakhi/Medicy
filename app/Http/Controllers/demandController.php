<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\medicine;
use App\Models\provider;
use App\Models\inDemand;

class demandController extends Controller
{

    public function searchDemandeItems(Request $request)
    {
        $barcode = $request->input('barcode');
        $quantity = $request->input('quantity');


        $medicine = inDemand::where('inDemand.idMedicine', $barcode)
        ->orWhere('inDemand.barcode', $barcode)
        ->join('medicine', 'medicine.idMedicine', '=', 'inDemand.idMedicine')
        ->select('inDemand.idMedicine AS number', 'medicine.name', 'medicine.price')
        ->first();
    
    $item = [
        'number' => $medicine->number,
        'name' => $medicine->name,
        'quantity' => $quantity,
        'price' => $medicine->price,
    ];
    

        // Return the item as JSON response
        return response()->json(['item' => $item]);
    }


    public function index()
{
    $inDemands = inDemand::all();
    $medicines = collect();
    $providers = collect();

    foreach($inDemands as $inDemand) {
        $medicine = medicine::find($inDemand->idMedicine);
        $medicines->put($inDemand->idMedicine, $medicine);
        
        $provider = provider::find($inDemand->idProvider);
        $providers->put($inDemand->idProvider, $provider);
    }

    return view("pages/demands/index")->with(['inDemands' => $inDemands, 'medicines' => $medicines, 'providers' => $providers]);
} 

    public function add($idMedicine,$quantity,$idProvider){
        $inDemand = inDemand::where('idMedicine', '=', $idMedicine)
                    ->where('idProvider', '=', $idProvider)
                    ->first();

        if($inDemand){
            $inDemand->idProvider=$idProvider;
             $inDemand->quantity+=$quantity;

        }
        else{
        $inDemand=new inDemand();
        $medicine=medicine::find($idMedicine);
        $inDemand->idMedicine=$idMedicine;
        $inDemand->idProvider=$idProvider;
        $inDemand->quantity=$quantity;
        $inDemand->barcode=$medicine->barcode;
        }
        $inDemand->save();
        return redirect()->route('demand.index');

    }

    public function create(Request $request,$id)
    {
        $providers=provider::all();
        return view("pages/demands/create")->with(['idMedicine'=>$id,'quantity' => $request->quantity,'providers'=>$providers]);
    }

    
public function show($idDemand){
    $inDemand = inDemand::find($idDemand);
    $medicine = medicine::find($inDemand->idMedicine);
    $provider = provider::find($inDemand->idProvider);

    return view("pages/demands/show")->with(['inDemand' => $inDemand, 'medicine' => $medicine, 'provider' => $provider]);
}

public function edit($idDemand){
    $inDemand = inDemand::find($idDemand);    
    $medicine = medicine::find($inDemand->idMedicine);
    $provider = provider::all();
    return view("pages/demands/edit")->with(['inDemand' => $inDemand, 'providers' => $provider]);;
}
public function save(Request $request,$idDemand){
    $inDemand = inDemand::find($idDemand);
    $inDemand->quantity=$request->quantity;
    $inDemand->idProvider=$request->provider;
    $inDemand->save();
    return redirect()->route('demand.index');

}
public function destroy($idDemand){
    $inDemand = inDemand::find($idDemand);
    $inDemand->delete();
    return redirect()->route('demand.index');
}


}
