@extends('layouts.client')

@section('style')
@endsection

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub total</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($carts as $cart)
                        @php
                            $subTotal = $cart->priceNew * $cart->quantityNew;
                        @endphp
                        <tr>
                            <td>ddd</td>
                            <td>$ {{number_format($cart->priceNew)}}</td>
                            <td>
                                <input type="hidden" id="priceValue_{{$cart->id}}" value="{{$cart->priceNew}}">
                                <input type="number" class="form-control text-center" width="5%" value="{{$cart->quantityNew}}" onchange="updateQuantity(this.value, {{$cart->id}})">
                            </td>
                            <td><span id="textPrice_{{$cart->id}}">$ {{number_format($subTotal, 0, '.', '.')}}</span></td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>

                        <td class="text-center">
                            <strong>Total
                                <span class="text-primary" id="textTotal">$ {{number_format($total, 0, '.', '.')}}</span>
                            </strong>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            <form action="{{route('post_add_product_cart')}}" method="POST" id="formCart">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nombres</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <table>
                    <tr>
                        <td><a href="{{route('get_index')}}" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a></td>
                        <td colspan="2"></td>


                        <td>
                            <button type="submit" class="btn btn-success btn-block" id="saveCart">Comprar
                                <i class="glyphicon glyphicon-menu-right"></i>
                            </button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </form>
            </div>
        </div>
    </div>
    <!-- Fin Page Content -->

@endsection

@section('script')
    <script src="{{asset('js/addProduct/updateCart.js')}}"></script>
    <script src="{{asset('js/addProduct/cartValidation.js')}}"></script>
    <script src="{{asset('js/addProduct/formatNumber.js')}}"></script>
@endsection


