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

    //FALTA CONSULTA PARA COMPROBAR QUE SI UN USUARIO EXISTA NO TE PERMITA REGISTRARTE ASÍ

    //FALTA CONSULTA PARA SABER EL TIPO DE USUARIO SEGÚN EL NÚMERO DE CUENTA
    
    //Consulta
    $peticionRegistro = "INSERT INTO usuarios VALUES ($numcuenta, '$usuario', '$correo', '$contrasena',
    NULL, NULL, NULL, NULL, 'alumno', '$nombre')";
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