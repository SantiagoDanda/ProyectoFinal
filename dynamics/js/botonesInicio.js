//////////////BOTONES DEL INICIO -DANDA/////////////////////

const preguntas = document.getElementById("btn-preguntas");
const botones = document.getElementsByClassName("botonPrin");

preguntas.addEventListener("click", (evento) => {
    window.location.href = "../../statics/templates/preguntasPrincipal.html";
});

botones[0].addEventListener("click", (evento) =>{ //Calendario
    window.location.href = "";
});
botones[1].addEventListener("click", (evento) =>{ //Clases
    window.location.href = "../php/clases/clases.php";
});
botones[3].addEventListener("click", (evento) =>{ //Juegos
    window.location.href = "";
});
botones[4].addEventListener("click", (evento) =>{ //Calificaciones
    window.location.href = "";
});