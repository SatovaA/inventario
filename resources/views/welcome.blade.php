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
                        <th scope="col">Nombre producto</th>
                        <th scope="col">Fecha creación</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>
                                <a href="{{route('get_product_edit', $product->id)}}" class="mr-2">
                                    <i class="fas fa-edit text-info font-16"></i>
                                </a>
                                <a href="{{route('get_product_edit', $product->id)}}" class="btn btn-primary btn-sm">Editar producto</a>
                                <a href="{{route('get_product_entries', $product->id)}}" class="btn btn-secondary btn-sm">Enntradas productos</a>
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


