<?php
    require "../conexion.php";
    $conexion = connect();
    session_start();

    $nombreClase = $_GET['nombre'];

    $consulta = "SELECT id_clase from clases where nombre = '$nombreClase'";
    $sql = mysqli_query($conexion, $consulta);
    $sql = mysqli_fetch_array($sql);

    $consultaNombres= "SELECT nombre from clasehasusuario inner join usuarios on clasehasusuario.id_usuario=usuarios.numcuenta where id_clase =$sql[0]";
    $sql = mysqli_query($conexion, $consultaNombres);

    $resultados = [];
    while($row = mysqli_fetch_assoc($sql))
    {
        $resultados[] = array("nombre" => $row["nombre"]);
    }
    echo json_encode($resultados);
?>