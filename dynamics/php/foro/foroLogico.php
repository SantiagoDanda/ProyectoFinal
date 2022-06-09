<?php
        session_start();
        include("../conexion.php");
        $conexion = connect();
        // sesión numCuenta  
        $numcuenta = $_SESSION['numcuenta'];

        //fecha
        $fechaSubida = date("Y-m-d H:i:s");
        $descripcion= (isset($_POST['comentarioForo'])&& $_POST["comentarioForo"] != "")? $_POST['comentarioForo']: "Sin comentarios";
        $archivoName= (isset($_POST['nameArch'])&& $_POST["nameArch"] != "")? $_POST['nameArch']: 'sin nombre archivo';

        $etiqueta= (isset($_POST['etiqueta'])&& $_POST["etiqueta"] != "")? $_POST['etiqueta']: "Sin etiqueta";
        echo "adfasdlfñjasdlfds";

        $peticionRegistro = "INSERT INTO publicaciones VALUES (NULL, $numcuenta, '$fechaSubida', NULL, NULL, NULL, '$etiqueta', '$descripcion')";
        $consultaForo = mysqli_query($conexion, $peticionRegistro);

    
        echo "adfasdlfñjasdlfds";
 
        $z= "SELECT MAX(id_publicacion) FROM publicaciones";
        $z = mysqli_query($conexion, $z);
        $z = mysqli_fetch_array($z);

        if(isset($_FILES['archivo'])){
            if($archivoName != 'sin nombre archivo'){
                $name= $_FILES['archivo']['name'];
                $ext = pathinfo($name,PATHINFO_EXTENSION);
                if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'docx'){
                    rename($arch, '../../../statics/media/archivosPublicaciones/'.$nombre.'.'.$ext);
                    $nombreC = $archivoName.'.'.$ext;
                    if($archivoName != "sin nombre archivo"){
                        $peticionInfo = "UPDATE publicaciones SET archivo='$nombreC' WHERE id_publicacion=$z[0]";
                        $peticionInfo =  mysqli_query($conexion, $peticionInfo);
                    }
                }else{
                    echo"Solo aceptamos imagenes con extención .jpg, .jpeg, .png, .pdf, .docx ";
                }
            }
        }
// falta reparar 
        
       
    if($consultaForo == true){
        echo'
        <script type="text/javascript">
            alert("El archivo fue enviado correctamente");
            window.location.href="./foroPrincipal.php";
        </script>';
        die();
    }else{
        echo'
        <script type="text/javascript">
            alert("Algo falló.");
        </script>';
        die();
    }
    if($peticionInfo == true){
        echo'
        <script type="text/javascript">
            alert("El archivo fue enviado correctamente");
            window.location.href="./foroPrincipal.php";
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
    // window.location.href="../Perfil.php";

    ?>
        
?>