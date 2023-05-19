<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;
use App\Models\medicine;
use App\Models\provider;
use App\Models\inDemand;

class stocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::where('inStock', '=', '1')->get();
        $outOfStocks = Stock::where('inStock', '=', '0')
        ->whereRaw('DATEDIFF(CURDATE(), updated_at) <= 30')
        ->get();
    
        return view("pages.stocks.stocks")->with(['stocks' => $stocks, 'outOfStocks' => $outOfStocks]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addStock($idDemand)
    {
        //si l'element n'existe deja il faut just ajouter la quantite demander
        $inDemand=inDemand::find($idDemand);
        $medicines = medicine::find($inDemand->idMedicine);
        $inDemand->delete();
        if(!stock::find($inDemand->idMedicine)){
            $stock = new stock();
            $stock->id = $inDemand->idMedicine;
            $stock->quantity = $inDemand->quantity; 
            $stock->form = $medicines->form;
            $stock->name = $medicines->name;
            $stock->marketingStatus = $medicines->marketingStatus;
            $stock->approvalDate = $medicines->approvalDate;
            $stock->price = $medicines->price;
            $stock->barcode = $medicines->barcode;
        }
        else{
            $stock = stock::find($inDemand->idMedicine);
            $stock->inStock='1';
            $stock->quantity += $inDemand->quantity; 
        }
        
        
        $stock->save();

        return redirect()->route('stock.index')->with('success', 'Stock added successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function outStock(Request $request, $id)
    {

        $stock = stock::find($id);
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1|max:'.$stock->quantity,
        ]);

        if($stock->quantity == $request->quantity ){
            $stock->inStock=false;
            $stock->save();
        }
    
        $stock->quantity -= $validatedData['quantity'];
        $stock->save();
    
        return redirect()->route('stock.index')->with('success', 'Stock updated successfully');
    }


    public function deleteItems(Request $request)
{
    $items = $request->json()->all();

    foreach ($items as $item) {
        $id = $item['id'];
        $quantity = $item['quantity'];
        $stock = stock::find($id);

        if($stock->quantity == $quantity){
            $stock->inStock=false;
            $stock->save();
        }
    
        $stock->quantity -= $quantity;
        $stock->save();
    }

    return response()->json(['message' => 'Items deleted successfully']);
}




    public function searchItems(Request $request)
    {
        // Retrieve the barcode from the request
        $barcode = $request->input('barcode');
        $quantity = $request->input('quantity');

        // Perform the search operation or retrieve the item data based on the barcode

        
        $stock = Stock::where('id','=',$barcode)->orWhere('barcode','=','6111248360130')->first();
        $item = [
            'number' => $stock->id,
            'name' => $stock->name,
            'quantity' => $quantity,
            'price' => $stock->price,
        ];

        // Return the item as JSON response
        return response()->json(['item' => $item]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
