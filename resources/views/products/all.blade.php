<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de productos</title>
    <style>
    .productos{
        display:flex;
        justify-content:space-around;
        align-items:center;
        border:1px solid green;
        flex-direction:row;
        flex-wrap:wrap;
    }
    .producto{
        border:1px solid red;
        width:30%;
        color:red;
    }
    </style>
</head>
<body>
    <h2>Ver todos los productos</h2>
    <div class="productos">
        @forelse($productos as $producto)
            <div class="producto">
            <h4>{{$producto->name}}</h4>
            <p>{{$producto->description}}</p>
            <span>{{$producto->price}}</span>

            <form action="/agregarAlCarrito" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$producto->id}}">
                <button type="submit">Agregar al carrito</button>
            </form>
            </div>
        @empty
        NO HAY PRODUCTOS CARGADOS AUN.
        @endforelse
    </div>
</body>
</html>