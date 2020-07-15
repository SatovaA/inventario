<?php

namespace App\Http\Controllers;


use App\Client;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderProduct(Request $request)
    {
        try {

            $cart = \Session::get('cart');

            $client = Client::where('email', $request->email)
                ->first();

            if(!empty($client)){
                $client->email = $request->email;
                $client->name = $request->name;
                $client->update();
                $idClient = $client->id;
            }else{
                $newClient = new Client;
                $newClient->email = $request->email;
                $newClient->name = $request->name;
                $newClient->save();

                $idClient = $newClient->id;
            }

            foreach ($cart as $carts){
               $order = new Order();
               $order->quantity = $carts->quantityCart;
               $order->price = $carts->priceNew;
               $order->detail_product_id = $carts->id;
               $order->client_id = $idClient;
               $order->status = 1;
               $order->save();
            }


            alert()->success('Exitoso','El pedido se genero.');
            return redirect()->route('get_index');

        }catch(\Exception $e){

            dd($e);
            alert()->error('Error','Ocurrio un error al guardar la información.');
            return redirect()->route('get_index');
        }
    }
}
