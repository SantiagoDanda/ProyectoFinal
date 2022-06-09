<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nombreClase = $_GET['nombre'];
        echo'
            <div>
                <form action="./archivo/archivoTarea.php?nombre='.$nombreClase.'" method="POST" enctype="multipart/form-data">
                    <fieldset><br/>
                        <legend>Subir Tareas</legend>
                        <h1>Subir Comentario</h1>
                        <label for="comentario">Comentario: </label>
                        <input type="text" name="comentario" id="comentario"> (opcional)<br/><br/>
                        <label for="fechaEntrega">Fecha de entrega: </label>
                        <input type= "date" name="fechaEntrega"> (opcional)<br/><br/>
                        <label for="puntos">Puntos: </label>
                        <input required type= "number" name="puntos" min="0" max="100"> x de 100 pts <br/><br/>
                        
                        <label for="nombreAct">Nombre de la actividad: </label> 
                        <input  required type="text" name="nombreAct"> (requerido)
                        <h1>Subir archivo</h1>
                        <label for="namei">Nombre del archivo</label>
                        <input required type="text" name="namei" id="namei">
                        <br/><br/>
                        <label for="archivo">Archivo: </label>
                        <input type="file" name="archivo" id="archivo">
                        <br/><br/>
                        <input type="submit" value="enviar"><br/><br/>
                        <input type="reset" value="borrar">
                    </fieldset>
                </form>
            </div>
        ';
    ?>
</body>
</html>