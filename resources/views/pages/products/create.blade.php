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
                <form action="{{route('post_product_store')}}" method="post" id="formProduct">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="quantity" id="quantity" required>
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


