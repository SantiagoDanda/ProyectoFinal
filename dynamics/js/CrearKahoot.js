class pregunta{
    constructor(){
        this.Pregunta;
        this.Respuesta=[];
        this.RespuestaCorrecta;
    }
}
function CrearPregunta(){
    let inputsname=["Pregunta", "RespuestaA","RespuestaB", "RespuestaC", "RespuetaD"]
    let NuevaPregunta=document.createElement("div");
    for(let i=0; i<5; i++){
        let label= document.createElement("label");
        label.htmlFor=inputsname[i];
        label.innerHTML=inputsname[i];
        NuevaPregunta.appendChild(label)
        let input =document.createElement("input");
        input.type="text";
        input.name=inputsname[i];
        NuevaPregunta.appendChild(input);
            for(let a=0; a<2; a++){
                let br = document.createElement("br");
                NuevaPregunta.appendChild(br);
            }
    }
    let labelselect= document.createElement("label");
    labelselect.htmlFor="RespuestaCorrecta";
    labelselect.innerHTML="Respuesta Correcta";
    NuevaPregunta.appendChild(labelselect);
    let selectvalues=["A", "B", "C", "D"];
    let select= document.createElement("select");
    select.name="RespuestaCorrecta";
    for(let i=0; i<4; i++){
        let option= document.createElement("option");
        option.value= selectvalues[i];
        option.innerHTML= selectvalues[i];
        select.appendChild(option);
    }
    NuevaPregunta.appendChild(select);
    NuevaPregunta.className="NuevaPregunta";
    for(let valores of NuevaPregunta.children){
        valores.className="NuevaPregunt"
    }
    let BotonBorrar= document.createElement("div");
    BotonBorrar.innerHTML="Borrar pregunta";
    BotonBorrar.className="BotonBorrar";
    BotonBorrar.addEventListener("click", ()=>{
        Cuestionario.removeChild(BotonBorrar.parentElement);
    })
    NuevaPregunta.appendChild(BotonBorrar)
    return NuevaPregunta
}

 const agregarPregunta = document.getElementById("BotonAgregarPregunta");
 const Cuestionario= document.getElementById("Cuestionario");
 const Enviar= document.getElementById("Btn-Enviar");

 agregarPregunta.addEventListener("click", ()=>{
    let  addpregunta=CrearPregunta();
    console.log(addpregunta);
    Cuestionario.appendChild(addpregunta);
 })
 Enviar.addEventListener("click", ()=>{
     let guardar= Cuestionario.children;
     let arraypreguntas=[];
     console.log(guardar);
     console.log(guardar[0])
     console.log(guardar[1]);
     for(let indice=0; indice<guardar.length; indice++){
        arraypreguntas[indice]= new pregunta();
        arraypreguntas[indice].Pregunta= guardar[indice].children[1].value;
        arraypreguntas[indice].Respuesta[0]= guardar[indice].children[5].value;
        arraypreguntas[indice].Respuesta[1]= guardar[indice].children[9].value;
        arraypreguntas[indice].Respuesta[2]= guardar[indice].children[13].value;
        arraypreguntas[indice].Respuesta[3]= guardar[indice].children[17].value;
        arraypreguntas[indice].RespuestaCorrecta= guardar[indice].children[21].value;
     }
     let xp= JSON.stringify(arraypreguntas);
     console.log(xp);
     console.log(JSON.parse(xp));
     xp=JSON.parse(xp)
     console.log(xp[0].Pregunta)
     let data = new FormData();
     document.children[0].children[1].del
     data.append("data", JSON.stringify(arraypreguntas))
     fetch("../../dynamics/php/Guardarkahoot.php",{
        method: "POST",
        body: data,
     }).then((response)=>{
        return response.json();
     }).then((data)=>{
        console.log(data);
        window.alert("El cuestionario fue agregado el id de tu cuestionario es "+data[0]);
        window.location.href="../../dynamics/php/alumnoPrincipal.php";
     })
 })


