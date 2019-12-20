<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi carrito</title>
</head>
<body>
    <h3>Carrito</h3>
    @php 
    $total = 0;
    @endphp
     @forelse($carritoActual->products as $producto)
        <div class="producto">
            <h4>{{$producto->name}}</h4>
            <p>{{$producto->description}}</p>
            <span>{{$producto->price}}</span>
        </div>
        @php 
        $total = $total + $producto->price;
        @endphp
     @empty
     AUN NO HAS COMPRADO NADA
     @endforelse

     <h3>{{$total}}</h3>

     <a href="/comprar">Finalizar compra</a>
</body>
</html>