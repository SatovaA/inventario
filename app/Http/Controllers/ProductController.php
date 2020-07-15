<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();

        return view('welcome', compact('products'));
    }
    public function create()
    {
        return view('pages.products.create');
    }

    public function store(Request $request)
    {
        try {

            $product = new Product;
            $product->name = $request->name;
            $product->save();

            alert()->success('Exitoso','El producto se agrego.');
            return redirect()->route('get_product_list');

        }catch(\Exception $e){

            alert()->error('Error','Ocurrio un error al guardar la información.');
            return redirect()->route('get_product_list');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('pages.products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        try {

            $product = Product::find($request->idProduct);
            $product->name = $request->name;
            $product->update();

            alert()->success('Exitoso','El producto se actualizo correctamente.');
            return redirect()->route('get_product_edit', $request->idProduct);

        }catch(\Exception $e){
            alert()->error('Error','Ocurrio un error al guardar la información.');
            return redirect()->route('get_product_edit', $request->idProduct);
        }
    }
}
