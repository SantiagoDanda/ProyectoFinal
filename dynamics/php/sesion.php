<?php
    /////////////////INICIOSESION-PAPUYISUS////////////////////

    session_start();

    //Esto incluye la conexión a la BD
    include("./conexion.php");
    $conexion = connect();

    // envía el nombre y la contra al iniciar la sesion
    $nombre = (isset($_POST["usuarioSes"]) && $_POST["usuarioSes"] != "") ? $_POST["usuarioSes"]: false;
    $contrasena = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "") ? $_POST["contrasena"]: false;

    // hacer petición a la base de datos pidiendo la contraseña 
    // la petición se hace conforme al usuario, lo busca 
    $peticionUsuario = "SELECT usuario from usuarios where usuario = '$nombre'";
    $consulta = mysqli_query($conexion, $peticionUsuario);
    $consulta = mysqli_fetch_array($consulta);

    $peticionContrasena = "SELECT contrasena from usuarios where contrasena = '$contrasena' and usuario = '$nombre'";
    $consultaContra = mysqli_query($conexion, $peticionContrasena);
    $consultaContra = mysqli_fetch_array($consultaContra);


    // verifica que el usuario exista
    if($consulta != NULL){
        // verifica que la contraseña coincida con la del usuario
        if($contrasena != $consultaContra[0]){
            echo '
                <script>
                    alert("El usuario no existe, por favor registrate");
                    window.location.href="./../..";
                </script>
            ';
        }else if($contrasena == $consultaContra[0]){
            $_SESSION["usuario"] = $nombre;
            echo '
                <script>
                    window.location.href="./alumnoPrincipal.php";
                </script>
            ';

            ///PETICIÓN PARA OBTENER NUMERO DE CUENTA-DANDA///
            $consultaNumero = "SELECT numcuenta FROM usuarios where usuario = '$nombre'";
            $consulta = mysqli_query($conexion, $consultaNumero);
            $consulta = mysqli_fetch_array($consulta);
            
            $_SESSION["numcuenta"] = $consulta[0];

        }
    }else if($consulta == NULL){
        echo'
            <script>
                alert("El usuario no existe, por favor registrate");
                window.location.href="./../..";
            </script>
        ';
    }
?>
