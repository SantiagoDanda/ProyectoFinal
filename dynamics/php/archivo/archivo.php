<?php
    session_start();
    include("../conexion.php");
    $conexion = connect();
    // sesión numCuenta para   
    $numcuenta = $_SESSION['numcuenta'];


    if(isset($_FILES['archivo'])){
        $nombre= (isset($_POST['namei'])&& $_POST["namei"] != "")? $_POST['namei']: "No especifico";
        $name= $_FILES['archivo']['name'];
        $ext= $extencion = pathinfo($name,PATHINFO_EXTENSION);
        $arch= $_FILES['archivo']['tmp_name'];

        if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
            rename($arch, '../../../statics/media/'.$nombre.'.'.$ext);
            $nombreC = $nombre.'.'.$ext;
            echo"$nombreC";
            $peticionInfo = "UPDATE usuarios SET url='$nombreC' WHERE numcuenta=$numcuenta";
        }else{
            echo"Solo aceptamos imagenes con extención .jpg, .jpeg o png ";
        }

    }else if(isset($_FILES['archivo'])!=true){

    }
    $consultaA = mysqli_query($conexion, $peticionInfo);

    if($consultaA == true){
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
            window.location.href="../añadirInfo.php";
        </script>';
        die();
    }
?>