<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea una nueva peli</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    
        @csrf 
        Titulo:
        <input type="text" name="title">
        <span style="color:red;">{{$errors->first('title')}}</span>
        <br>
        Premios:
        <input type="text" name="awards">
        <span style="color:red;">{{$errors->first('awards')}}</span>
        <br>
        Rating:
        <input type="text" name="rating">
        <span style="color:red;">{{$errors->first('rating')}}</span>
        <br>
        <input type="file" name="poster">
        <br>
        <button type="submit">Crear peli</button>
    </form>
</body>
</html>