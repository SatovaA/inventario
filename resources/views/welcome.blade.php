@extends('layouts.app')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
            </div>
            <div class="card-body">
                <div class="col-lg-12" align="center">
                    <a href="{{route('get_product_create')}}" class="btn btn-secondary">Crear productos</a>
                </div>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">N° lote</th>
                        <th scope="col">Nombre producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha vencimiento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->lot_number}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>$ {{number_format($product->price, 0, '.', '.')}}</td>
                            <td>{{$product->expiration_date}}</td>
                            <td>
                                <a href="{{route('get_product_edit', $product->id)}}" class="mr-2">
                                    <i class="fas fa-edit text-info font-16"></i>
                                </a>
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


