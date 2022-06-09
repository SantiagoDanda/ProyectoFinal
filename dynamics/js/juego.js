const Pregunta = document.getElementById("Pregunta");
const Respuestas = document.getElementById("Respuestas");
var Preguntas =[];
const Timer= document.getElementById("timer");
const Entrar= document.getElementById("Entrar");
const contenedorPreguntas= document.getElementById("contenedorPreguntas");
var respuesta;
var puntuacion=0;
var contadorPreguntas=0;
var contadorTiempo=0;
var Tiempo
var preguntasErroneas=[];

contenedorPreguntas.style.display="none";

function actualizar_pregunta(){

    Pregunta.innerHTML=Preguntas[contadorPreguntas].Pregunta;
    for(i=0; i<4; i++)
    {
        Respuestas.children[i].innerHTML=Preguntas[contadorPreguntas].Respuesta[i];
        //Pregunta.childNodes[i].innerHTML="<p>"+Preguntas[contadorPreguntas].Respuesta[i]+"</p>";
    }
}

function mostrarRespuestas(){
    let contenedorRespuestas =document.createElement("div");
    for(valores of preguntasErroneas){
        let pregunta = document.createElement("div");
        pregunta.innerHTML="Pregunta: <br>"+valores.Pregunta+"<br><br>Respuesta correcta: <br>";
        if(valores.RespuestaCorrecta=="A"){
            pregunta.innerHTML+=valores.Respuestas[0];
        }else if(valores.RespuestaCorrecta=="B"){
            pregunta.innerHTML+=valores.Respuestas[1];
        }else if(valores.RespuestaCorrecta=="C"){
            pregunta.innerHTML+=valores.Respuestas[2];
        }else if(valores.RespuestaCorrecta=="D"){
            pregunta.innerHTML+=valores.Respuestas[3];
        }
        contenedorRespuestas.appendChild(pregunta);
    }
    return contenedorRespuestas;
}

Entrar.addEventListener("click", (event)=>{
    if(event.target.id){
        fetch("../../dynamics/php/Cargarkahhut.php?idform="+Entrar.children[0].value,{
            method: "GET"
        }).then((response)=>{
            return response.json();
        }).then((data)=>{
            if(data==null){
                alert("El código de juego no es válido");
            }else{
                console.log(data);
                Preguntas=data;
                Entrar.style.display="none";
                contenedorPreguntas.style.display="block";
                actualizar_pregunta();
                Tiempo= setInterval(()=>{
                    contadorTiempo++;
                    Timer.innerHTML="Tiempo en juego "+contadorTiempo;
                }, 1000);
            }
        })
    }
})
Respuestas.addEventListener("click", (event)=>{
    console.log(event);
    if(event.target.id== Preguntas[contadorPreguntas].RespuestaCorrecta){
        puntuacion++;
        window.alert("Respuesta correcta");
    }else{
        if(puntuacion>0)
        {
            preguntasErroneas.push(Preguntas[contadorPreguntas]);
        }
        window.alert("Respuesta incorrecta");
    }
    contadorPreguntas++;
    if(contadorPreguntas<Preguntas.length){
        actualizar_pregunta();
    }else{
        clearInterval(Tiempo);
        let pantallaFinal=document.createElement("div");
        pantallaFinal.className="FinDelJuego";
        pantallaFinal.innerHTML="Fin del juego </br></br>Puntuación final: "+puntuacion+" de "+Preguntas.length+"<br><br>Tiempo Total: "+contadorTiempo+" segundos";
        contenedorPreguntas.style.display="none";
        document.children[0].children[1].appendChild(pantallaFinal);
        // let si =mostrarRespuestas()
        // pantallaFinal.appendChild(si)
    }
    
})

// function mostrarRespuestas(){
//     let contenedorRespuestas =document.createElement("div");
//     for(valores of preguntasErroneas){
//         let pregunta = document.createElement("div");
//         pregunta.innerHTML="Pregunta: <br>"+valores.Pregunta+"<br><br>Respuesta correcta: <br>";
//         if(valores.RespuestaCorrecta=="A"){
//             pregunta.innerHTML+=valores.Respuestas[0];
//         }else if(valores.RespuestaCorrecta=="B"){
//             pregunta.innerHTML+=valores.Respuestas[1];
//         }else if(valores.RespuestaCorrecta=="C"){
//             pregunta.innerHTML+=valores.Respuestas[2];
//         }else if(valores.RespuestaCorrecta=="D"){
//             pregunta.innerHTML+=valores.Respuestas[3];
//         }
//         contenedorRespuestas.appendChild(pregunta);
//     }
//     return contenedorRespuestas;
// }
