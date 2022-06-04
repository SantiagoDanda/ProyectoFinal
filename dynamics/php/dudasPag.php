<?php
    session_start();
?>
<!-- PÁGINAS DE DUDAS-LUCA -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dudas</title>
    <link rel="stylesheet" href="../../statics/style/css/dudas.css">
</head>
<body>
    <h1>¡Déjanos tus dudas!</h1>
    <form action="./dudas.php" method="post">
        <label for="asunto">Asunto: </label><br>
        <input required type="text" id="asunto" name="asunto" placeholder="¿Cuál es tu asunto?"><br><br>
        <label for="comentario">Comentario: </label><br>
        <textarea id="comentario" name="comentario" rows="5" cols="25"></textarea><br><br>
        <label for="archivo">Archivo (Opcional): </label>
        <input type="file" id="archivo" name="archivo"><br><br>
        <input type="submit">
    </form>
</body>
</html>
