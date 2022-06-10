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
    <?php
        session_start();
        $tipo = $_SESSION["tipo"];


    ?>
    <?php
    echo '<div class="fondo">
        <h1>Página principal</h1>
        <form action="./Perfil.php">
            <button class="perfil">Perfil</button>
        </form>
        <button class="botonPrin" id="btn-calendario">Calendario</button>
        <button class="botonPrin" id="btn-clases">Clases</button>
        <button class="botonPrin" id="btn-preguntas">Preguntas</button>
        ';
        echo '
        <form action="../../statics/templates/juegosPrincipal.html">
            <button class="botonPrin" id="btn-juegos">Juegos</button>
        </form>
        ';
        if($tipo != "profe"){
            echo '<form action="./calificaciones/calificaciones.php">
                <button class="botonPrin" id="btn-calificaciones">Calificaciones</button>
            </form>';
        }
        echo '
        <form action="./cerrarSesion.php">
            <button class="botonPrin" id="btn-sesion">Cierra tu sesion</button>
        </form>
        ';
        echo '</div>
        <script src="../js/botonesInicio.js"></script>
    ';
    ?>
</body>
</html>