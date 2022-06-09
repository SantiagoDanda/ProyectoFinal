<?php
    /////////////////INICIOSESION-YISUS////////////////////

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

    $peticionContrasena = "SELECT contrasena from usuarios where usuario = '$nombre'";
    $consultaContra = mysqli_query($conexion, $peticionContrasena);
    $consultaContra = mysqli_fetch_array($consultaContra);

    $sal=hash("sha256", $nombre);
    $posible_pimienta= str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
    for($i=0; $i< count($posible_pimienta); $i++)
    {
        for($a=0; $a< count($posible_pimienta); $a++){
            $posiblecontrasena=hash("sha256", $contrasena.$posible_pimienta[$i].$posible_pimienta[$a].$sal);
            if($posiblecontrasena==$consultaContra[0]){
                $contrasenacorrecta=true;
                $a=count($posible_pimienta);
                $i=count($posible_pimienta);
            }
            else{
                // $contrasenacorrecta=false;
            }
        }
    }

    // verifica que el usuario exista
    if($consulta != NULL){
        // verifica que la contraseña coincida con la del usuario
        if($contrasenacorrecta==false){
            echo '
                <script>
                    alert("Contraseña incorrecta");
                    window.location.href="./../..";
                </script>
            ';
        }else if($contrasenacorrecta==true){
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
            
            //PARA TIPO DE USUARIO//
            $consultaTipo = "SELECT tipo FROM usuarios where usuario = '$nombre'";
            $consulta = mysqli_query($conexion, $consultaTipo);
            $consulta = mysqli_fetch_array($consulta);
            
            $_SESSION["tipo"] = $consulta[0];

            //PARA EL PERFIL
            $consultaUrl = "SELECT url FROM usuarios where usuario = '$nombre'";
            $consulta = mysqli_query($conexion, $consultaUrl);
            $consulta = mysqli_fetch_array($consulta);
            
            $_SESSION["url"] = $consulta[0];
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
