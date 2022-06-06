<?php
    header("Content-Type: application/json");

    require "../conexion.php";
    $conexion = connect();
    session_start();
    $codigo = (isset($_POST["codigo"]) && $_POST["codigo"]!= "")?$_POST["codigo"]:false;
    $error = 0;

    $consultaCodigo = "SELECT id_clase FROM clases WHERE id_clase = $codigo";
    $consulta = mysqli_query($conexion, $consultaCodigo);

    if(mysqli_num_rows($consulta) != 0){
        $consultaExistencia =  "SELECT id_usuario FROM clasehasusuario WHERE id_usuario = $_SESSION[numcuenta] AND id_clase = $codigo";
        $peticion = mysqli_query($conexion, $consultaExistencia);
        
        if(mysqli_num_rows($peticion) == 0){
            $peticionUnirse =  "INSERT INTO clasehasusuario VALUES (NULL, $codigo, $_SESSION[numcuenta])";
            $peticion = mysqli_query($conexion, $peticionUnirse);
        }
        else{
            $error = 1;
        }
    }
    else{
        $error = 1;
    }

    if($error == 1){
        // $respuesta = array("ok"=>false, "texto" => "No se pudo ingresar");
        echo '{"ok":false, "texto":"Esa clase no existe o ya estás inscrito. No me quieras trolear."}';
    }
    else{
        // $respuesta = array("ok"=>false, "texto" => "No se pudo ingresar");

        echo '{"ok":true, "texto":"chaval"}';

    }