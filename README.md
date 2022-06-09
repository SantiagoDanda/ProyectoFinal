# Título: Desarrollo de un aula virtual para la ENP 6

## Descripción:

Explicación:

Nuestro proyecto consiste en un aula virtual, en la cual puedes jugar diversos juegos educativos, ver fechas importantes, tener diferentes clases con tareas y anuncios, dichas tareas pueden ser calificadas por el maestro. También tiene un foro de preguntas, en el cual los alumnos pueden preguntar y responder entre ellos sobre distintos temas académicos.

Tecnologías:

    1. PHP
    2. JavaScript
    3. Mysql
    4. CSS
    6. HTML
    7. Explorador

Importancia:
    Nuestro proyecto va a ayudar a la ENP 6 a no depender de una página externa para poder mantener contacto con sus alumnos, es intuitiva de usar para el usuario.

## Instalación:
0. Descargar XAMPP link: https://www.apachefriends.org/es/download.html
1. Descargar el repositorio
2.  Agregar la Base de Datos a la carpeta bin dentro de xampp/mysql/bin
3. Prende el servidor de apache tanto MySQL
4. Inserta la Base de Datos:
Dentro de la terminal en windows
cd  C:\xampp\mysql\bin

mysql -u root --default-character-set=utf8

SET names 'utf8';

USE moodle;

SOURCE moodle.sql; 

5. Abrir el archivo index.html en tu navegador de la siguiente forma: http://localhost/ProyectoFinal/index.html

## Uso:
1. Registrate en la pagina
2. Inicia sesion
3. En la pagina principal puedes acceder a diferentes rubros, un calendario, las clases en las que te inscribas, preguntas, juegos, calificaciones y observar tu perfil.
4. El calendario te dará la fecha de los eventos importantes de la ENP 6.
5. Las clases debes ingresar el id que te proporcione tu profesor, dentro de la vista puedes entrar a tus clases inscritas y checar anuncios y tareas encargadas por tu maestro.
6. En la seccion de preguntas hay 3 botones, el primero es un pequeño formulario en el que nos puede mandar dudas el estudiantado. El segundo boton, son las preguntas frecuentes de la pagina en la que puedes encontar informacion relevante. El tercer boton te manda al foro de preguntas, es una pequeña red social en la que puedes preguntar y responder preguntas de otros estudiantes.
7. En la seccion de juegos hay 2 juegos que puedes jugar, uno de ellos es un ahorcado, el otro es un juego de preguntas con diferentes temas para seleccionar.
8. En la sección de calificaciones puedes checar las calificaciones de los cursos en los que estas inscrito asi como un promedio de esa materia.
9. Esta ultima sección, perfil, aqui puedes ver tu información asi como poder cambiar tu imagen de perfil y descripción.

## Organización de las carpetas

Existen 3 carpetas con subcarpetas:

dynamics: Aqui estan todas los archivos de JS y PHP

libs: Bibliotecas de bootstrap

statics: docs contiene la base de datos, media tiene las imagenes, style todas las hojas de estilo de css, templates contiene los maquetados de html.

## Créditos

Santiago Danda:
Hice la base de datos, el registro, el incio de sesión, la parte de base de datos de las dudas y las clases.

Jesús Morales:
Hice el maquetado, funcionalidad perfil, funcionalidad foro, calificaciones y algo de css.
