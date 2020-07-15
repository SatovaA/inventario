<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $products = Product::select('detail_products.id','products.name','quantity','lot_number','expiration_date','price')
            ->join('detail_products', 'detail_products.product_id', '=', 'products.id')
            ->get();
        return view('index', compact('products'));
    }

}
