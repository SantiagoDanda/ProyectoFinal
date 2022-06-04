<!-- Manda las dudas al sistema-->
<?php 
    // conexion a la bd
    //include("./conexion.php");
    //$conexion= connect();

    $nCuenta = (isset($_POST["nCuenta"]) && $_POST["nCuenta"] != "") ? $_POST["nCuenta"]: false;
    $asunto = (isset($_POST["asunto"]) && $_POST["asunto"] != "") ? $_POST["asunto"]: false;
    $comentario = (isset ($_POST["comentario"]) && $_POST["comentario"] != "") ? $_POST["comentario"]: false;
    $archivo = (isset ($_POST["archivo"]) && $_POST["archivo"] != "")? $_POST["archivo"]: false;
    var_dump($nCuenta, $asunto);
    echo "a";
?>