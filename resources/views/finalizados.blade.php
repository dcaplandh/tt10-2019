<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historial de compras</title>
</head>
<body>
    <h4>Compras hechas</h4>
    @forelse($carritosCerrados as $carrito)
        Compra - {{$carrito->id}}
        <br>
        Productos:
        @foreach($carrito->products as $product)
            <p>{{$product->name}} - ${{$product->price}}</p>
        @endforeach
    @empty
    AUN NO HAS COMPRADO NADA.
    @endforelse
</body>
</html>