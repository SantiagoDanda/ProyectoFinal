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
        echo'
        <h1>Subir archivo</h1>
        <form action="./archivo/archivo.php" method="POST" enctype="multipart/form-data">
            <fieldset><br/>
                <legend>Subir imágenes</legend>
                <label for="namei">Nombre de la imagen</label>
                <input required type="texto" name="namei" id="namei">
                <br/><br/>
                <label for="archivo">Archivo: </label>
                <input type="file" name="archivo" id="archivo">
                <br/><br/>
                <input type="submit" value="enviar"><br/><br/>
                <input type="reset" value="borrar">
            </fieldset>
        </form>
        ';
    ?>
</body>
</html>