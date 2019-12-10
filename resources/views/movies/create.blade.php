<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea una nueva peli</title>
</head>
<body>
    <form action="" method="POST">
        @csrf 
        Titulo:
        <input type="text" name="title">
        <br>
        Premios:
        <input type="text" name="awards">
        <br>
        Rating:
        <input type="text" name="rating">
        <br>
        <button type="submit">Crear peli</button>
    </form>
</body>
</html>