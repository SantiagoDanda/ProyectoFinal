const contenedor = document.getElementById("contenedorCal");
// contenedor.addEventListener("click", (evento) =>{
//     if(evento.target.className == 'estiloB'){
//         console.log("entre");
//         let idBoton = evento.target.id;
//         console.log(idBoton);
//         evento.preventDefault();
//         const body ={idClase: idBoton};
//         console.log(body);
//         fetch("./listaCalif.php", {
//             method:"POST",
//             headers:{
//                 "Content-Type":"aplication/json"
//             },
//             body: JSON.stringify(body),
//         }).then((response)=>{
//             console.log(response);
//             return response.json();
//         }).then((datosJSON)=>{
//             if(datosJSON.ok){
//                 console.log("salió bien");
//                 window.location.src = "./listaCalif.php";
//             }else{
//                 console.log("salió mal");
//             }
//         });
//     }
// }); 

contenedor.addEventListener("click", (evento)=>{
    if(evento.target.className = ("estiloB")){
      let id = evento.target.dataset.id;

      fetch("dynamics/php/pokemon.php?id="+id)
        .then((response)=>{
          return response.json();
        })
        .then((datosJSON)=>{
          if(datosJSON.ok == true){
             console.log("todo salió bien");
          }
        });
    }
  });