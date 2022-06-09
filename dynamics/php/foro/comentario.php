
<?php
    session_start();
    require "../conexion.php";
    $conexion = connect();

    $texto= (isset($_POST['coment'])&& $_POST["coment"] != "")? $_POST['coment']:NULL;
    $fechaSubida = date("Y-m-d H:i:s");

    $peticionComentario = "INSERT INTO comentarios VALUES (NULL, $numcuenta, '$fechaSubida', NULL, NULL, NULL, '$etiqueta', '$descripcion')";
    $consultaComent = mysqli_query($conexion, $peticionComentario);

    if($consultaComent == true){
        echo'
        <script type="text/javascript">
            alert("El archivo fue enviado correctamente");
            window.location.href="../Perfil.php";
        </script>';
        die();
    }else{
        echo'
        <script type="text/javascript">
            alert("Algo falló.");
        </script>';
        die();
    }

?>
