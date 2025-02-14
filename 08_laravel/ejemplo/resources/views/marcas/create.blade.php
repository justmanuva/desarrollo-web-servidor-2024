<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva marca</title>
</head>
<body>
    {{-- Creamos método post para crear una Marca --}}
    {{-- Cuando se envia, te lleva a marcas/index --}}
    <form action="{{ route('marcas.store')}}" method="post">
        {{-- CROSS-SITE REQUEST FORGERY --}}
        @csrf
        <label>Marca: </label>
        <input type="text" name="marca"><br><br>
        <label>Año de fundación: </label>
        <input type="number" name="ano_fundacion"><br><br>
        <label>País: </label>
        <input type="text" name="pais"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>