<?php
    session_start();
    include("../conexion.php");
    $conexion = connect();
    $comentario= (isset($_POST['comentarioSubir'])&& $_POST["comentarioSubir"] != "")? $_POST['comentarioSubir']: 'subido';
 
    //variable
    $fechaSubida = date("Y-m-d H:i:s");
    $numCuenta = $_SESSION['numcuenta'];

    $peticionRegistro = "INSERT INTO tareas VALUES (NULL, NULL, $numCuenta, NULL, 1, NULL, '$fechaSubida')";
    $peticionReg =  mysqli_query($conexion, $peticionRegistro);
    $subidoo = mysqli_fetch_array($peticionReg);
    if($subidoo == true){
        echo'
        <script type="text/javascript">
            alert("La tarea fue completada");
            window.location.href="./subirTarea.php";
        </script>';
        die();
    }    else{
        echo'
        <script type="text/javascript">
            alert("Algo falló.");
        </script>';
        die();
    } 
?>