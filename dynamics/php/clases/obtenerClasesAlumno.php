<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();

    if($_SESSION['tipo'] == 'alumno'){
        $consultaClases = "SELECT nombre FROM clasehasusuario NATURAL JOIN clases where id_usuario = $_SESSION[numcuenta]";
        $peticionConsultar = mysqli_query($conexion, $consultaClases);

        $resultados = [];
        while($row = mysqli_fetch_assoc($peticionConsultar))
        {
            $resultados[] = array("nombre" => $row["nombre"]);
        }

        echo json_encode($resultados);
    
    }elseif($_SESSION['tipo'] == 'profe'){
        $consultaClases = "SELECT nombre FROM clases where numerodecuentaM = $_SESSION[numcuenta]";
        $peticionConsultar = mysqli_query($conexion, $consultaClases);

        $resultados = [];
        while($row = mysqli_fetch_assoc($peticionConsultar))
        {
            $resultados[] = array("nombre" => $row["nombre"]);
        }
        echo json_encode($resultados);
    }