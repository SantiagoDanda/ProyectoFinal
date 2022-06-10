<?php
    session_start();
    $nombre = $_GET['nombre'];

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../statics/style/css/vistaClase.css">
        <title>Clase</title>
    </head>
    <body>
        <div id="contenedor-entradas">
            <div class="entradas" id="novedades">Novedades</div>
            <div class="entradas" id="trabajo">Trabajo en clase</div>
            <div class="entradas" id="personas">Personas</div>
        </div>

        <div id="contenedor-clase">
            <div id="nombre-clase">'.$nombre.'</div>
        </div>
            
        <div id="contenedor-datos">

            <div id="info" style="display: flex;">
                <h1>¡Bienvenido a tu clase!</h1>
                El código de la clase es:
                <h2 id="codigo">
                </h2>
            </div>

            <div id="hacer-post" style="display: none;">
                <form id="post">
                    <div class="campo">Haz una publicación <br>
                        <textarea name="publicacion" id="txt-publicacion" cols="40" rows="8">
                        </textarea>
                    </div><button id="btn-enviarPub">Publicar</button>
                </form>
            </div>     
            
            <div id="publicaciones" class="publicacion" style="display: none;">
            </div>

            <div id="personasLista" style="display: none;"></div>

            <div id="subir-tarea">
                ';
                if($_SESSION['tipo'] == 'profe'){
                    echo'
                    <button id="btn-subirtarea" style="display: none;">Subir tarea</button>
                    ';
                }else{
                    echo'
                    <div id="btn-subirtarea"></div>
                    ';
                }
            echo'
                <div id="tareas" style="display: none;"><h1>TAREAS:</h1><br><br></div>
            </div>
        </div>
        <form action="../subirTarea/subirTarea.php">
            <button>Subir tu tarea</button>
        </form>
        <form action="../alumnoPrincipal.php">
        <button class="boton">Regresar a sala principal</button>
        </form>
    </body>
    </html>

    <script src="../../js/vistaClase.js"></script>
    ';
