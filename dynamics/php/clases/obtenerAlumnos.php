<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();

    $nombreClase = $_GET['nombre'];

    $consultaNombres= "SELECT nombre from clasehasusuario inner join usuarios on clasehasusuario.id_usuario=usuarios.numcuenta";
    $sql = mysqli_query($conexion, $consultaNombres);

    $resultados = [];
    while($row = mysqli_fetch_assoc($sql))
    {
        $resultados[] = array("nombre" => $row["nombre"]);
    }
    echo json_encode($resultados);
?>