<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../statics/style/css/perfil.css">
    <!-- <link href='../../libs/bootstrap-5.2.0-beta1-dist/'> -->

</head>
     <!-- <div id="fotoPerfil">
        <div id="fotoPerfilF"></div>
    </div>
    <button>+</button><br/>
    <br/>
    <div id="textoPerfil"></div> -->
    <?php
        session_start();

        include("./conexion.php");
        $conexion = connect();
        //Sesion Usuario
        $nombre = $_SESSION["usuario"];
        $numCuenta = $_SESSION["numcuenta"];
        // si es maestro es igual a profe y si no es igual a alumno
        $tipo= $_SESSION["tipo"];

        // variable
        $arregloClases = NULL;
        //Estas son las peticiones a la base de datos;
        $peticionUsuario = "SELECT usuario from usuarios where usuario = '$nombre'";
        $consultaPerfilUs = mysqli_query($conexion, $peticionUsuario);
        $consultaPerfilUs = mysqli_fetch_array($consultaPerfilUs);

        $peticionGrupo = "SELECT grupo from usuarios where usuario = '$nombre'";
        $consultaPerfilG = mysqli_query($conexion, $peticionGrupo);
        $consultaPerfilG = mysqli_fetch_array($consultaPerfilG);

        $peticionContacto = "SELECT contacto from usuarios where usuario = '$nombre'";
        $consultaPerfilC = mysqli_query($conexion, $peticionContacto);
        $consultaPerfilC = mysqli_fetch_array($consultaPerfilC);
        // imagen
        $peticionUrl = "SELECT url FROM usuarios where usuario = '$nombre'";
        $consultaPerfilU = mysqli_query($conexion, $peticionUrl);
        $consultaPerfilU = mysqli_fetch_array($consultaPerfilU);

        $peticionTipo = "SELECT tipo from usuarios where usuario = '$nombre'";
        $consultaPerfilT = mysqli_query($conexion, $peticionTipo);
        $consultaPerfilT = mysqli_fetch_array($consultaPerfilT);

        $peticionCorreo = "SELECT correo from usuarios where usuario = '$nombre'";
        $consultaPerfilCo = mysqli_query($conexion, $peticionCorreo);
        $consultaPerfilCo = mysqli_fetch_array($consultaPerfilCo);

        $peticionInfo = "SELECT info from usuarios where usuario = '$nombre'";
        $consultaPerfilI = mysqli_query($conexion, $peticionInfo);
        $consultaPerfilI = mysqli_fetch_array($consultaPerfilI);
        
        //dirección de imagenes de perfil
        // $consultaPerfilU[0] = "Faraon.jpeg";
        // $consultaPerfilU[0] = "";
        $direccionImagen = "../../statics/media/img/".$consultaPerfilU[0];
        $inicial = substr($consultaPerfilUs[0], 0,1);
        $inicial = strtoupper($inicial);
        // //////////////////////////////7hacer que detecte si es público o no /////////////7
        $publico = true;
        // arreglo de Cursos
        
        // arreglo de 
        
        $peticionClases = "SELECT nombre FROM clasehasusuario NATURAL JOIN clases where id_usuario = $_SESSION[numcuenta]";
        $clases = mysqli_query($conexion, $peticionClases);
        $z=0; 
        while($clasess = mysqli_fetch_array($clases)){
            // var_dump($materiav[0]);
            $arregloClases[$z] = $clasess;
            $z++;
        }
        // var_dump($arregloClases);

        // echo"$inicial";

        //Parte lógica para mostrar el perfil
        echo "<div id='fotoPerfil'>";
            if($consultaPerfilU[0] != NULL){
                echo"<img id='perfil' alt='Foto perfil' src=".$direccionImagen.">";
            }else{
                echo"<div id= 'perfilSinFoto'><strong>".$inicial."</strong></div>";
            }
            echo"
            </div>
                <form action='./añadirInfo.php'>             
                    <button class='botonAgImg'>+</button>(añadir/actualizar información)<br/><br/>
                </form>
            <div>";
        
                if($tipo != NULL){
                    echo "(".$tipo.")<br/><br/>";
                }else{
                    echo "<br/><strong>Tipo </strong> No tenemos esta información, añadela <br/>";
                }
                echo "<u>".$consultaPerfilUs[0]."</u>";
                if($consultaPerfilG[0] !=NULL){
                    echo "<br/><br/><br/><strong>Grupo: </strong>".$consultaPerfilG[0]."";
                }else{
                    echo "<br/><br/><br/><strong>Grupo: </strong> No tenemos esta información, añadela";
                }
                if($consultaPerfilC[0] !=NULL){
                    echo "<br/><strong>Contacto: </strong><a href=".$consultaPerfilC[0].">".$consultaPerfilC[0]."</a>";
                }else{
                    echo "<br/><strong>Contacto: </strong> No tenemos esta información, añadela ";
                }

                     echo "<br/><br/><strong>Cursos en los que participa: </strong><br/>";
                if($arregloClases != Null){
                    for($i = 0; $i < $z; $i++){
                        echo "- ".$arregloClases[$z]["clases"]."<br/>"; 
                    }
                }else{
                    if($tipo == "profe"){
                        echo "<br/>No tienes ninguna clase<br/>";
                    }else{
                        echo "<br/>No estás inscrito a ninguna clase<br/>";
                    }
                }

                if($consultaPerfilI[0] !=NULL){
                    echo "<br/><strong>Información sobre mi: </strong><br>".$consultaPerfilI[0]."";
                }else{
                    echo "<br/><strong>Acerca de mi: </strong><br/> No tenemos esta información, añadela ";
                }
                if($publico != false){
                    if($consultaPerfilCo[0] != NULL){
                        echo"<br/><br/><strong>Correo: ".$consultaPerfilCo[0]."";
                    }else{
                        echo "<br/><br/><strong>Correo: </strong> No tenemos esta información, añadela";
                    }
                    if($consultaPerfilCo[0] != NULL){
                        echo"<br/><br/><strong>Número de cuenta: ".$numCuenta."";
                    }else{
                        echo "<br/><br/><strong>Número de cuenta: </strong> No tenemos esta información, añadela";
                    }
                }

            echo "</div>
        ";

    ?>

    <!-- <script src="../js/perfil.js">

    </script> -->
</body>
</html>
