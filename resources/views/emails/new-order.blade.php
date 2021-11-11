<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo pedido</title>
</head>
<body>
    <p>Se ha realizado un nuevo pedido</p>
    <p>Estos son los datos del cliente que realizó el pedido:</p>
    <ul>
        <li>
          <strong>Nombre:</strong>
          {{$user->name}}
        </li>
        <li>
          <strong>Email</strong>
          {{$user->email}}
        </li>
        <li>
          <strong>Fecha de pedido</strong>
          {{$cart->fecha_pedido}}
        </li>
    </ul>
    <hr>
    <p>Detalles del pedido:</p>
    <ul>
      @foreach ($cart->details as $detail)
          <li>
            {{$detail->product->name}} x {{$detail->cantidad}}
            ($ {{$detail->cantidad*$detail->product->price}})
          </li>
      @endforeach
    </ul>
    <p>
      <strong>Total a pagar:</strong>{{$cart->total}}
      
    </p>
    <p>
      <strong>Cantidad de productos:</strong>{{$cart->stock}}
    </p>
    <hr>
    <p>
        <a href="{{url('/admin/orders/'.$cart->id)}}">Haz clic aquí</a>
        Para ver información sobre este pedido
    </p>
</body>
</html>