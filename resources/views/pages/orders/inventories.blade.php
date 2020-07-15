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
                <div class="col-lg-12" align="center">
                    <a href="{{route('get_product_create')}}" class="btn btn-secondary">Inventario</a>
                </div>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre producto</th>
                        <th scope="col">valor producto</th>
                        <th scope="col">Cantidad total</th>
                        <th scope="col">Cantidad vendida</th>
                        <th scope="col">Cantidad restante</th>
                        <th scope="col">Valor total</th>
                        <th scope="col">Valor vendido</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @php
                            $payment = \App\Http\Controllers\OrderController::counOrder($product->id);
                        @endphp
                        <tr>
                            <td>{{$product->name_product}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$payment->quantityT}}</td>
                            <td>{{$product->quantity-$payment->quantityT}}</td>
                            <td>{{$product->quantity * $product->price}}</td>
                            <td>{{$payment->priceSum * $product->quantityT}}</td>

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


