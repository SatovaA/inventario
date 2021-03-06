@extends('layouts.app')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Registro de productos</h6>
            </div>
            <div class="card-body">
                <form action="{{route('post_product_entries')}}" method="post" id="formProduct">
                    @csrf
                    <input type="hidden" name="idProduct" value="{{$product->id}}">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre producto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$product->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="quantity" id="quantity" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" id="price" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Número de lote</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lot_number" name="lot_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fecha vencimiento</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                   required>
                        </div>
                    </div>
                    <input type="submit" value="Enviar" id="saveProduct">
                </form>
            </div>
        </div>

    </div>
    <!-- Fin Page Content -->

@endsection

@section('script')
<script src="{{asset('js/entries/validations.js')}}"></script>
@endsection


