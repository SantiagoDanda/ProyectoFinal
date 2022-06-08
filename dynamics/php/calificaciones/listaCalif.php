<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link rel="stylesheet" href="../../../statics/style/css/listaCalif.css  ">
</head>
<body>

    <?php
        require "../conexion.php";
        $conexion = connect();
        $usuario= 321432343;
        //variables
        $arregloName = NULL;
        // peticiones de tarea has usuarios
        $peticionName = "SELECT nombre from tareahasusuario inner join tareas on tareahasusuario.id_tarea=tareas.id_tarea where tareahasusuario.numcuenta = $usuario";
        $z= 0;
        $name = mysqli_query($conexion, $peticionName);
        while($idName = mysqli_fetch_array($name)){
            $arregloName[$z] = $idName;
            $z++;
        }
        if($arregloName != NULL){
            $totalClases =count($arregloName);
        }else{
            $totalClases = 0;
        }
        $peticionCal = "SELECT calificacion FROM tareahasusuario where numcuenta = $usuario";
        $calif = mysqli_query($conexion, $peticionCal);
        $z= 0;
        while($califf = mysqli_fetch_array($calif)){
            if($calif != NULL){
                $arregloCalif[$z] = $califf;
            }else{
                $arregloCalif[$z] = "No tienes calificación";
            }
            $z++;
        }
        $promedio = 0;
        for($i = 0; $i < $totalClases; $i++){
            $promedioo = $arregloCalif[$i]["calificacion"];
            $promedio += $promedioo;
        }
        $promedio = $promedio/$totalClases;
        echo $promedio;

        $peticionFecha = "SELECT fechasubida FROM tareahasusuario where numcuenta = $usuario";
        $fecha = mysqli_query($conexion, $peticionFecha);
        $z= 0;
        while($fechaa = mysqli_fetch_array($fecha)){
            if($fechaa != NULL){
                $arregloFecha[$z] = $fechaa;
            }else{
                $arregloFecha[$z] = "No entregaste esta actividad";
            }
            $z++;
        }
        // $numcuenta = (isset($_POST["numeroC"]) && $_POST["numeroC"] != "") ? $_POST["numeroC"]: false;
        echo'
                <h1>Mis calificaciones: </h1><br/>
                <div id="centro">

                <table border="1">
                    <thead>
                        <tr>
                            <th><h2>Nombre de la actividad: </h2></th>
                            <th><h2>Fecha entregada y retardos:</h2></th>
                            <th><h2>Calificación: </h2></th>
                        </tr>
                    </thead>
                    <tbody>';
                    if($totalClases != 0){
                        for($i = 0; $i < $totalClases; $i++){
                            echo '<tr>
                                <td>'.$arregloName[$i]["nombre"].'</td>
                                <td>'.$arregloFecha[$i]["fechasubida"].'</td>
                                <td>'.$arregloCalif[$i]["calificacion"].'</td>
                            </tr>';
                        }
                    }else{
                        echo'no tienes calificaciones';
                    }
                    echo '</tbody>
                </table>
            </div>
        ';
    ?>
</body>
</html>