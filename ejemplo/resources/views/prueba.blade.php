<!DOCTYPE html>
<html>
<head>
    <title>Prueba Page</title>
</head>
<body>
    <h1>Hello, {{ $nombre }}!</h1>
    <p>Edad: {{ $edad }}</p>
    
    <?php 
        echo "<a href='" . route('bienvenido') . "'>Ir Welcome Page</a>";


        
    ?>
</body>

<form action="/usuario/registrar" method="post">
    @csrf
    <input type="text" name="nombre" placeholder="ingrese nombre">
    <input type="submit" value="enviar">
</form>
</html>
