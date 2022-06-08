const entradas = document.getElementById("contenedor-entradas"); 
const nombreClase = document.getElementById("nombre-clase");

const contenedorDatos = document.getElementById("contenedor-datos"); //todo

const txtarea = document.getElementById("txt-publicacion"); //txtarea

const botonEnviarPub = document.getElementById("btn-enviarPub"); //enviar boton
const form = document.getElementById("post"); //form

const hacerPost= document.getElementById("hacer-post");
const publicaciones = document.getElementById("publicaciones");

const personas = document.getElementById("personasLista");

const subirTarea = document.getElementById("subir-tarea");
const subirTareaBtn = document.getElementById("btn-subirtarea");
const tareas = document.getElementById("tareas");

let dibujar = 0;

entradas.addEventListener("click", (evento) =>{
    if(evento.target.id == 'personas'){

        subirTareaBtn.style.display = "none"
        hacerPost.style.display = "none";
        publicaciones.style.display = "none";
        personas.style.display = "block";
        tareas.style.display = "none";

        fetch("./obtenerAlumnos.php?nombre="+nombreClase.textContent+"")
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                let long = datosJSON.length;
                
                if(dibujar != 1){
                    for(let i=0; i<=long-1; i++){
                            personas.innerHTML += "<div class='personas'>"+datosJSON[i].nombre+"</div>";
                    }
                }
                dibujar = 1;
            });
    }

    if(evento.target.id == 'trabajo'){
        personas.style.display = "none";
        hacerPost.style.display = "none";
        publicaciones.style.display = "none"
        subirTareaBtn.style.display = "block"
        tareas.style.display = "block";

        subirTareaBtn.addEventListener("click", ()=>{
            window.location.href = "../subirTareas.php?nombre="+nombreClase.textContent+"";
        });

        fetch("./obtenertareas.php?nombre="+nombreClase.textContent+"")
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                for (let tarea of datosJSON) {
                    tareas.innerHTML += "<div class='tareas-contenedor'>"+tarea+"<br><br></div>";
                }
            })
    }

    if(evento.target.id == 'novedades'){
        
        subirTareaBtn.style.display = "none"
        personas.style.display = "none";
        hacerPost.style.display = "flex";
        publicaciones.style.display = "block"
        tareas.style.display = "none";

        fetch("./obtenerpublicaciones.php?nombre="+nombreClase.textContent+"")
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                for (let iterador of datosJSON) {
                    publicaciones.innerHTML += '<div class="datosPub">'+iterador[0]+'<br>'+iterador[2]+'<br>'+iterador[1]+'<br><br></div>'
                }
            })
    }
});

botonEnviarPub.addEventListener("click", (eventoBoton)=>{
    eventoBoton.preventDefault();
    console.log(eventoBoton.target);
    let datosForm = new FormData(form);
    fetch("./enviarPublicacion.php?nombre="+nombreClase.textContent+"", {
        method:"POST",
        body: datosForm,
    }).then((response)=>{
        console.log(response);
        return response.json();
    }).then((datosJSON)=>{
        alert("Publicación creada");
    });
});

