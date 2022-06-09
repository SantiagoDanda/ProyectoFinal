<!-- te registra -->

<?php
    //Esto incluye la conexión a la BD
    include("./conexion.php");
    $conexion = connect();
    ////////////////////REGISTRO-DANDA////////////////////

    $numcuenta = (isset($_POST["numeroC"]) && $_POST["numeroC"] != "") ? $_POST["numeroC"]: false;
    $correo = (isset($_POST["correoReg"]) && $_POST["correoReg"] != "") ? $_POST["correoReg"]: false;
    $contrasena = (isset($_POST["contraseñaReg"]) && $_POST["contraseñaReg"] != "") ? $_POST["contraseñaReg"]: false;
    $confcontrasena = (isset($_POST["confirmContra"]) && $_POST["confirmContra"] != "") ? $_POST["confirmContra"]: false;
    $nombre = (isset($_POST["nombreCom"]) && $_POST["nombreCom"] != "") ? $_POST["nombreCom"]: false;
    $usuario = (isset($_POST["usuario"]) && $_POST["usuario"] != "") ? $_POST["usuario"]: false;
    //Lo de arriba es pa' que lleguen los datos del form correctamente hasta nosotros.


    if($confcontrasena != $contrasena){ //Comprueba que las contraseñas sean iguales
        echo'
        <script type="text/javascript">
            alert("Las contraseñas no coinciden.");
            window.location.href="./../..";
        </script>';
        die();
    }

    /////////////////COMPROBAR SI USUARIO O NÚMERO DE CUENTA YA ES UTILIZADO//////////////////////
    $consultaCompruebaNum = "SELECT numcuenta FROM usuarios WHERE numcuenta = $numcuenta";
    $consulta = mysqli_query($conexion, $consultaCompruebaNum);
    $consulta = mysqli_fetch_array($consulta);

    if($consulta != NULL){ //Aquí le estoy diciendo: Si el número que metí en el formulario ya existe
                           //en la BD, entonces no dejes que se registre y regresa al index
        echo'
        <script type="text/javascript">
            alert("Ya hay un usuario con este número de cuenta.");
            window.location.href="./../..";
        </script>';
        die();
    }

    $consultaCompruebaUsuario = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
    $consulta = mysqli_query($conexion, $consultaCompruebaUsuario);
    $consulta = mysqli_fetch_array($consulta);

    if($consulta != NULL){ //Exactamente lo mismo que con el if de arriba, pero con el usuario.
        echo'
        <script type="text/javascript">
            alert("Ya existe este usuario.");
            window.location.href="./../..";
        </script>';
        die();
    }
    /////////////////////////////////////////////////////////////////////////////////////

    //FALTA CONSULTA PARA SABER EL TIPO DE USUARIO SEGÚN EL NÚMERO DE CUENTA
    $arregloNumCuenta = array_map('intval', str_split($numcuenta));

    if($arregloNumCuenta[0] == 4 && $arregloNumCuenta[1] == 0){
        $tipoDeUsuario = 'profe';
    }
    else{
        $tipoDeUsuario = 'alumno';
    }
    
    //////////////PETICIÓN PARA REGISTRAR////////////////////////
    $caracteres=str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
    $partesPimienta= array_rand($caracteres, 2);
    $pimienta= $caracteres[$partesPimienta[0]].$caracteres[$partesPimienta[1]];
    $sal= hash("sha256", $usuario);
    $contrasena= hash("sha256", $contrasena.$pimienta.$sal);
    $peticionRegistro = "INSERT INTO usuarios VALUES ($numcuenta, '$usuario', '$correo', '$contrasena',
    NULL, NULL, NULL, NULL, '$tipoDeUsuario', '$nombre')";
    $consulta = mysqli_query($conexion, $peticionRegistro);
    
    if($consulta == true){
        echo'
        <script type="text/javascript">
            alert("Registrado con éxito. :D");
            window.location.href="./../..";
        </script>';
        die();
    }else{
        echo'
        <script type="text/javascript">
            alert("Algo falló.");
            window.location.href="./../..";
        </script>';
        die();
    }
    //Consulta
?>