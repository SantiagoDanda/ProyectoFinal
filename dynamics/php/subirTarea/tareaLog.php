<?php
    session_start();
    $comentario= (isset($_POST['comentarioSubir'])&& $_POST["comentarioSubir"] != "")? $_POST['comentarioSubir']: 'subido';
    $nombreArchivo = (isset($_POST['archivo'])&& $_POST["archivo"] != "")? $_POST['archivo']: NULL;

    //variable
    $fechaSubida = date("Y-m-d H:i:s");
    $numCuenta = $_SESSION['numcuenta'];

    if($comentario == 'subido' || $comentario != NULL){
        $peticionRegistro = "INSERT INTO tareas VALUES (NULL, NULL, $numCuenta, NULL, 1, NULL, '$fechaSubida')";
    }
    $z= "SELECT MAX(id_tareahasusuario) FROM tareahasusuario";
    $z = mysqli_query($conexion, $z);
    $z = mysqli_fetch_array($z);

    if(isset($_FILES['archivo'])){
        if($archivoName != NULL){
            $name= $_FILES['archivo']['name'];
            $ext = pathinfo($name,PATHINFO_EXTENSION);
            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'docx'){
                if($archivoName != "sin nombre archivo"){
                    $peticionInfo = "UPDATE tareahasusuario SET url='$nombreC' WHERE id_tareahasusuario=$z[0]";
                    $peticionInfo =  mysqli_query($conexion, $peticionInfo);
                    $subidoo = mysqli_fetch_array($peticionInfo);
                }
            }else{
                echo"Solo aceptamos imagenes con extención .jpg, .jpeg, .png, .pdf, .docx ";
            }
        }
    }

    if($subidoo == true){
        echo'
        <script type="text/javascript">
            alert("El archivo fue enviado correctamente");
            window.location.href="./subirTarea.php";
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