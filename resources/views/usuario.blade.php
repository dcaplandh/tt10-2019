<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aca va el usuario</title>
    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>
<h1>Hola {{ $nombre2 }}!</h1>
<a href="{{ route('carrito') }}">Ir al carrito</a>
    @if(3>4)
    es mayor
    @else
    es menor
    @endif
</body>
</html>