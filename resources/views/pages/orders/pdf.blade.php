<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            text-transform: uppercase;
        }
        .contenido{
            font-size: 20px;
        }
        #primero{
            background-color: #ccc;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h1>Factura</h1>
<hr>
<div class="contenido">
    <p id="primero">Nombres: {{$orders->name_client}}</p>
    <p id="primero">Correo: {{$orders->email}}</p>
    <hr>
</div>

<table>
    <tr>
        <th>Nombre producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
    </tr>
    @foreach($payment as $order)
        <tr>
            <td>{{$order->name_product}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{number_format($order->price,0, '.','.')}}</td>
            <td>{{$order->price * $order->quantity}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
