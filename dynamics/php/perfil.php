

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../statics/style/css/perfil.css">
</head>
    <?php
        //Esto incluye la conexión a la BD
        include("./conexion.php");
        $conexion = connect();

        $peticionUsuario = "SELECT usuario from usuarios where usuario = '$nombre'";
        $consulta = mysqli_query($conexion, $peticionUsuario);
        $consulta = mysqli_fetch_array($consulta);
    
        $peticionContrasena = "SELECT contrasena from usuarios where contrasena = '$contrasena' and usuario = '$nombre'";
        $consultaContra = mysqli_query($conexion, $peticionContrasena);
        $consultaContra = mysqli_fetch_array($consultaContra);

        $peticionNumCuenta = "SELECT numcuenta from usuarios where numcuenta = '$contrasena' and usuario = '$nombre'";
        $consultaContra = mysqli_query($conexion, $peticionNumCuenta);
        $consultaContra = mysqli_fetch_array($consultaContra);

        echo'<div id="fotoPerfil">
            <div id="fotoPerfilF"></div>
        </div>
        <button>+</button><br/>
        <br/>
        <div id="textoPerfil"></div>
        <script src="../../dynamics/js/perfil.js"></script>';
    
    
    ?>
</body>
</html>