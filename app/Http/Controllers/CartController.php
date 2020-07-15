<?php

namespace App\Http\Controllers;

use App\DetailProduct;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * CartController constructor.
     */
    public function __construct()
    {
        if(!\Session::has('cart')) \Session::put('cart', array());
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     * fUNCION PARA gUARDAR DATOS DE LOS PRODUCTOS QUE SE VAN AGREGANDO
     */
    public function show(){
        //GUARDA VARIABLE DE CARRO DE COMPRAS
        $carts = \Session::get('cart');

        $products = Product::all();
        $total = $this->subTotal();

        return view('pages.cart.detail', compact('carts', 'products', 'total'));
    }

    /**
     * @return float|int
     * fUNCION PARA CONSULTAR EL VALOR TOTAL DE LOS PRODUCTOS DEL CARRO DE COMPTAS
     */
    private function subTotal()
    {
        $cart = \Session::get('cart');

        $total = 0;
        foreach($cart as $item){
            $total +=  $item->priceNew * $item->quantityNew;
        }
        return $total;
    }


    /**
     * @param Request $request
     * @param $idProduct
     * @return \Illuminate\Http\RedirectResponse
     * Función para ir almacenando los producto al carro de compras
     */
    public function cart(Request $request, $idProduct)
    {

        $data = $request->all();

        $quantityNew = $data['quantityNew'];
        $priceNew = $data['priceNew'];

        $detailProduct = DetailProduct::find($idProduct);

        $cart = \Session::get('cart');

        $detailProduct->quantityNew = $quantityNew;
        $detailProduct->priceNew = $priceNew;

        if ( !array_key_exists($detailProduct->id, $cart)){
            $cart[$detailProduct->id] = $detailProduct;
        }
        \Session::put('cart', $cart);
        alert()->success('Generado','Se ha almacenado un producto.');
        return redirect()->route('get_index');
    }

    /**
     * @param DetailProduct $idDetail
     * @param $quantity
     * @return \Illuminate\Http\JsonResponse
     * Funcion de json para ir actualizando los items del carro de compras
     */
    public function updateCart(DetailProduct $idDetail, $quantity){

        $cart = \Session::get('cart');
        $total = 0;

        $cart[$idDetail->id]->quantityNew = $quantity ;
        foreach($cart as $item){

            $total +=  $item->priceNew * $item->quantityNew;

        }

        \Session::put('cart', $cart);

        return response()->json(array("cart" => $idDetail, "total" => $total));
    }

    /**
     * @param DetailProduct $idDetail
     * @return \Illuminate\Http\JsonResponse
     * Función para eliminar productos del carro de compras
     */
    public function deleteRowCart(DetailProduct $idDetail){

        $cart = \Session::get('cart');
        unset($cart[$idDetail->id]);
        \Session::put('cart', $cart);

        return response()->json($idDetail);
    }
}
