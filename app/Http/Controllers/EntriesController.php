<?php

namespace App\Http\Controllers;

use App\DetailProduct;
use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class EntriesController extends Controller
{
    public function create($id)
    {
        $product = Product::find($id);
        return view('pages.entries.create', compact('product'));
    }

    public function store(Request $request)
    {
        try {

            $product = new DetailProduct();
            $product->quantity = $request->quantity;
            $product->lot_number = $request->lot_number;
            $product->expiration_date = $request->expiration_date;
            $product->price = $request->price;
            $product->product_id = $request->idProduct;
            $product->save();

            $inventory = new Inventory();
            $inventory->quantity = $request->quantity;
            $inventory->lot_number = $request->lot_number;
            $inventory->expiration_date = $request->expiration_date;
            $inventory->price = $request->price;
            $inventory->product_detail_id  = $product->id ;
            $inventory->save();


            alert()->success('Exitoso','La entrada del producto se agrego.');
            return redirect()->route('get_product_list');

        }catch(\Exception $e){
            alert()->error('Error','Ocurrio un error al guardar la información.');
            return redirect()->route('get_product_list');
        }
    }

}
