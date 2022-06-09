<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <!-- <link rel="stylesheet" href="../../..libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css"> -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../../../statics/style/css/foro.css"> -->
</head>
<body>
    <?php
        session_start();
        require "../conexion.php";
        $conexion = connect();

        //varibles
        $arregloComent = NULL;
        echo '<h1>Foro de preguntas y publicaciones</h1><br/>';

        echo '
        <div id="contenedor_id">
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Subir publicación   
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="./foroLogico.php" method="POST" enctype="multipart/form-data">
                            <fieldset><br/>
                                <h2>Subir mensaje al foro</h2>
                                <h3>Describe tu comentario: </h3>

                                <label for="comentarioForo">Comentario al foro: </label>
                                <input required type="text" name="comentarioForo" id="comentario"> (requerido)<br/><br/>
                                <label for="puntos">Puntos: </label>
                                
                                <h3>Subir imagen o archivo (opcional)</h3>
                                
                                    <label for="nameArch">Nombre del archivo</label>
                                    <input type="texto" name="nameArch" id="nameArch">
                                    <label for="etiqueta">Agrega etiqueta: (opcional)</label>
                                    <input type="texto" name="etiqueta" id="etiqueta">
                                    <br/><br/>
                                    <label for="archivo">Archivo: </label>
                                    <input type="file" name="archivo" id="archivo">
                                    <br/><br/>             
                                    <div class="modal-footer">
                                        <input type="submit" value="enviar"><br/><br/>
                                        <input type="reset" value="borrar">
                                    </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <form action="../alumnoPrincipal.php">
                <button>Regresar</button>
            </form>
            ';

            $peticionComent = "SELECT descripcion FROM publicaciones";
            $comentario = mysqli_query($conexion, $peticionComent);
            $z= 0;
            while($comentt = mysqli_fetch_array($comentario)){
                if($comentt != NULL){
                    $arregloComent[$z] = $comentt;
                }else{
                    $arregloComent[$z] = NULL;
                }
                $z++;
            }
            if($arregloComent != NULL){
                $totalPublicaciones =count($arregloComent);
            }else{
                $totalPublicaciones = 0;
            }

            $peticionNameArch = "SELECT archivo FROM publicaciones";
            $nombreArch = mysqli_query($conexion, $peticionNameArch);
            $z= 0;
            while($archivoo = mysqli_fetch_array($nombreArch)){
                if($archivoo != NULL){
                    $arregloArchivo[$z] = $archivoo;
                }
                $z++;
            }

            if($totalPublicaciones != 0){
                for($i= 0; $i < $totalPublicaciones;$i++){
                echo'<div id="contenedor_id">
                        <h4>Publicación</h4>
                        <strong>Descripción: </strong>'.$arregloComent[$i]['descripcion'].'<br/>
                        ';
                        if($arregloArchivo[$i]['archivo'] != NULL){
                            $direccionImagen[$i] = "../../../statics/media/archivosPublicaciones/".$arregloArchivo[$i]["archivo"];  
                            echo"<img id='perfil' class='imagen' alt='Foto perfil".$i."' src='".$direccionImagen[$i]."'><br/>";
                        }
                        echo '
                            <label for="coment"><strong>Agrega un comentario:</strong></label>
                            <input type="text" name="coment" id="comentario-'.$i.'">
                            <input type="submit" id='.$i.' class="botonC" value="enviar">   
                            <input type="reset" value="borrar">
                            <br/>';
                        $peticionTexto = "SELECT texto FROM comentarios WHERE id_publicacion = $i";
                        $texto = mysqli_query($conexion, $peticionTexto);
                        $z= 0;
                        $arregloTexto = NULL;
                        while($textoo = mysqli_fetch_array($texto)){
                            if($textoo != NULL){
                                $arregloTexto[$z] = $textoo;
                            }
                            $z++;
                        }
                        if($arregloTexto != NULL){
                            for($b = 0; $b < $z; $b++){
                                echo'- '.$arregloTexto[$b]['texto'].'<br/>';
                            }
                        }
                        echo'
                    </div>';
                }
            }else{
                echo'no existe publicaciones';
            }
        echo '
        </div>
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
        </script>
            <script src= "../../js/comentario.js">  
        </script>
        ';

    ?>    
</body>
</html>