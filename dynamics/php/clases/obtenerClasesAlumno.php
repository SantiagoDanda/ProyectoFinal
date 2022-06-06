<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();

    $consultaClases = "SELECT nombre FROM clasehasusuario NATURAL JOIN clases where id_usuario = $_SESSION[numcuenta]";
    $peticionConsultar = mysqli_query($conexion, $consultaClases);

    $resultados = [];
    while($row = mysqli_fetch_assoc($peticionConsultar))
    {
        $resultados[] = array("nombre" => $row["nombre"]);
    }

    echo json_encode($resultados);