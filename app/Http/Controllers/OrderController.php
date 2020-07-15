<?php

namespace App\Http\Controllers;


use App\Client;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderProduct(Request $request)
    {
        try {

            $cart = \Session::get('cart');
            if(count($cart)){
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

                $order = new Order();
                $order->client_id = $idClient;
                $order->status = 1;
                $order->save();

                foreach ($cart as $carts){
                    $payment = new Payment();
                    $payment->quantity = $carts->quantityNew;
                    $payment->price = $carts->priceNew;
                    $payment->detail_product_id = $carts->id;
                    $payment->order_id  = $order->id;
                    $payment->status = 1;
                    $payment->save();
                }
                \Session::forget('cart');

                alert()->success('Exitoso','El pedido se genero.');
            }else{
                alert()->info('Notificación','Debe agregar al menos un producto.');
            }

            return redirect()->route('get_index');

        }catch(\Exception $e){
            alert()->error('Error','Ocurrio un error al guardar la información.');
            return redirect()->route('get_index');
        }
    }


    public function listOrder()
    {


        $orders = Order::select('orders.id', 'clients.name as name_client', 'clients.email', 'orders.created_at as date')
        ->join('clients', 'clients.id', 'orders.client_id')
        ->where('orders.status', 1)
        ->get();

        return view('pages.orders.list', compact('orders'));
    }

    public function detailOrder($id)
    {


        $orders = Order::find($id);

        $payment = Payment::select('payment.price','payment.quantity', 'products.name as name_product')
            ->join('detail_products', 'detail_products.id', 'payment.detail_product_id')
            ->join('products', 'products.id', 'detail_products.product_id')
            ->where('order_id', $id)
            ->get();

        return view('pages.orders.detail', compact('payment'));
    }
    public function invoice($id)
    {

        $orders = Order::select('clients.name as name_client', 'clients.email', 'orders.created_at as date')
            ->join('clients', 'clients.id', 'orders.client_id')
            ->where('orders.id', $id)
            ->first();

        $payment = Payment::select('payment.price','payment.quantity', 'products.name as name_product')
            ->join('detail_products', 'detail_products.id', 'payment.detail_product_id')
            ->join('products', 'products.id', 'detail_products.product_id')
            ->where('order_id', $id)
            ->get();

        $pdf = \PDF::loadView('pages.orders.pdf', compact('orders','payment'));
        return $pdf->download('ejemplo.pdf');

    }

    public function inventories()
    {

        $products = Product::select('detail_products.id','detail_products.price','detail_products.quantity', 'products.name as name_product')
            ->join('detail_products', 'detail_products.product_id', '=', 'products.id')
            ->get();


        return view('pages.orders.inventories', compact('products'));
    }

    public static function counOrder($id)
    {

        $payment = Payment::select('products.name as name_product', DB::raw('sum(payment.quantity) as quantityT'),
            DB::raw('sum(payment.price) as priceSum'))
            ->join('detail_products', 'detail_products.id', 'payment.detail_product_id')
            ->join('products', 'products.id', 'detail_products.product_id')
            ->where('detail_product_id', $id)
            ->groupby('detail_product_id')
            ->first();


        return $payment;
    }
}
