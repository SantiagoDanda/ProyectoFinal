<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal alumno</title>
    <link rel="stylesheet" href="./../../statics/style/css/principal.css">
</head>
<body>
    <div class="fondo">
        <h1>Página principal</h1>
        <form action="../../statics/templates/Perfil.html">
            <button class="perfil">Perfil</button>
        </form>
        <button class="botonPrin">Calendario</button>
        <button class="botonPrin">Clases</button>
        <button class="botonPrin" id="btn-preguntas">Preguntas</button>
        <button class="botonPrin">Juegos</button>
        <button class="botonPrin">Calificaciones</button>
    </div>
    <script src="../js/perfil.js"></script>
    <script src="../js/botonesInicio.js"></script>
</body>
</html>
<?php
    session_start();
    echo $_SESSION["usuario"];
    echo $_SESSION["numcuenta"];

?>