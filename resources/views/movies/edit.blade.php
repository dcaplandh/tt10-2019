<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edita una nueva peli</title>
</head>
<body>
    <form action="" method="POST">
        @csrf 
        Titulo:
    <input type="text" name="title" value="{{$pelicula->title}}">
        <br>
        Premios:
        <input type="text" name="awards" value="{{$pelicula->awards}}">
        <br>
        Rating:
        <input type="text" name="rating" value="{{$pelicula->rating}}">
        <br>
        <button type="submit">Editar peli</button>
    </form>
</body>
</html>