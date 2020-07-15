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
                        <th scope="col">Nombre cliente</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha pedido</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name_client}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->date}}</td>
                            <td>

                                <a href="{{route('get_detail_order_product', $order->id)}}" class="btn btn-primary btn-sm">Detalle</a>
                                <a href="{{route('get_pdf_invoice_download', $order->id)}}" class="btn btn-primary btn-sm">Descargar factura</a>
                            </td>

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


