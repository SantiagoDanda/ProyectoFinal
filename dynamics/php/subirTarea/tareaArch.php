<?php


$z= "SELECT MAX(id_tareahasusuario) FROM tareahasusuario";
$z = mysqli_query($conexion, $z); 
$z = mysqli_fetch_array($z);

if($nombre != NULL){
    $peticionInfo = "UPDATE tareahasusuario SET url='$nombreC' WHERE id_tareahasusuario=$z[0]";
    $subidoo =  mysqli_query($conexion, $peticionInfo);                
}




if($subidoo == true){
    echo'
    <script type="text/javascript">
        alert("El archivo fue enviado correctamente");
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




    include("../conexion.php");
    $conexion = connect();
    $nombreArchivo = (isset($_POST['nameAct'])&& $_POST["nameAct"] != "")? $_POST['nameAct']: 'sinNombre';

    $z= "SELECT MAX(id_tareahasusuario) FROM tareahasusuario";
    $z = mysqli_query($conexion, $z); 
    $z = mysqli_fetch_array($z);
    if(isset($_FILES['archivoT'])){
        echo "holas";
        if($nombreArchivo != 'sinNombre'){
            $name= $_FILES['archivo']['name'];
            $ext = pathinfo($name,PATHINFO_EXTENSION);
            if($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'docx'){
                echo "holass";
                if($nombreArchivo != NULL){
                    $peticionInfo = "UPDATE tareahasusuario SET url='$nombreC' WHERE id_tareahasusuario=$z[0]";
                    $subidoo =  mysqli_query($conexion, $peticionInfo);                
                }
            }else{
                echo"Solo aceptamos imagenes con extención .jpg, .jpeg, .png, .pdf, .docx ";
            }
        }
    }else{
        echo"no sirve";
    }
    if($subidoo == true){
        echo'
        <script type="text/javascript">
            alert("El archivo fue enviado correctamente");
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