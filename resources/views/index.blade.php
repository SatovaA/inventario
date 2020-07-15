@extends('layouts.client')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            @foreach($products as $product)
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" align="center">{{$product->name}}</h5>
                        <p class="card-text">
                            <b>Precio: </b>
                            $ {{number_format($product->price, 0, '.','.')}}
                        </p>
                        <p class="card-text">
                            <label>Cantidad:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity">
                            <input type="hidden" name="idDetailProduct" id="idDetailProduct" value="{{$product->id}}">
                            <input type="hidden" name="price" id="price" value="{{$product->price}}">
                        </p>
                        <button type="button" id="add_product" class="btn btn-primary">Comprar</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Fin Page Content -->

@endsection

@section('script')
<script src="{{asset('js/addProduct/productAdd.js')}}"></script>
@endsection


