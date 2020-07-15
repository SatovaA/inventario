@extends('layouts.app')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pedidos</h6>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payment as $order)
                        <tr>
                            <td>{{$order->name_product}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{number_format($order->price,0, '.','.')}}</td>
                            <td>{{$order->price * $order->quantity}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Fin Page Content -->

@endsection

@section('script')

@endsection


