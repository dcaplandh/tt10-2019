<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de pelis</title>
    <style>
    div.container{
        width:90%;
        margin:auto;
        border:1px solid black;
        display:flex;
        flex-direction:row;
        flex-wrap:wrap;
        justify-content: space-around;
        align-items:center;
    }
    div.pelicula{
        width:30%;
        border:1px solid red;
    }
    </style>
</head>
<body>
    <h3>Todas las peliculas</h3>
    <div class="container">

        @foreach ($peliculas as $pelicula)
            <div class="pelicula">
                <h5>{{$pelicula->title}}</h5>
                <p>{{$pelicula->release_date}}</p>
                <h6>{{$pelicula->genre->name ?? "Sin genero"}}</h6>
            <a href="/pelicula/{{$pelicula->id}}">Ver detalle</a>
            </div>
        @endforeach
        


    </div>
</body>
</html>