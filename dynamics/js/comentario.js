const contenedor = document.getElementById("contenedor_id");


contenedor.addEventListener("click", (evento) =>{
    if(evento.target.className == 'botonC'){
        let idBoton = evento.target.id;
        const comentario = document.getElementById("comentario-"+idBoton);

        evento.preventDefault();
        const body ={comentario: comentario.value, idpublicacion: idBoton};
        console.log(body);
        fetch("./comentario.php", {
            method:"POST",
            headers:{
                "Content-Type":"aplication/json"
            },
            body: JSON.stringify(body),
        }).then((response)=>{
            console.log(response);
            return response.json();
        }).then((datosJSON)=>{
            if(datosJSON.ok){
                console.log("salió bien");
                // window.location.href ="./foroPrincipal.php";
            }
        });
    }
}); 