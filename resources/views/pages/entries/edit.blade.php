@extends('layouts.app')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edición de productos</h6>
            </div>
            <div class="card-body">
                <form action="{{route('put_product_update')}}" method="POST" id="formProduct">
                    @csrf

                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="idProduct" value="{{$product->id}}">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre producto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}"
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
<script src="{{asset('js/product/validations.js')}}"></script>
@endsection


