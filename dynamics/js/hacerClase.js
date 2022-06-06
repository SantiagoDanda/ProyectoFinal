const enviar = document.getElementById("btn-enviar");
const form = document.getElementById("form");
const clases = document.getElementById("clases");

enviar.addEventListener("click", (evento) =>{
    evento.preventDefault();
    let datosForm = new FormData(form);
    fetch("../../dynamics/php/clases/hacerClase.php", {
        method:"POST",
        body: datosForm,
    }).then((response)=>{
        // console.log(response);
        return response.json();
    }).then((datosJSON)=>{
        if(datosJSON.ok == true){
            alert("Clase creada.");
        }else{
            alert(datosJSON.texto);
        }
        // console.log(datosJSON);
    });
});

fetch("../../dynamics/php/clases/obtenerClasesAlumno.php")
    .then((response)=>{
        return response.json();
    })
    .then((datosJSON)=>{
        console.log(datosJSON[0].nombre);
        for(clase of datosJSON){
            clases.innerHTML+="<div id='"+clase.nombre+"' class='clases'>"+clase.nombre+"</div>"
        }
    });

clases.addEventListener("click", (evento) =>{
    window.location.href = "../../dynamics/php/clases/clasesprofe.php?nombre="+evento.target.id;
});
