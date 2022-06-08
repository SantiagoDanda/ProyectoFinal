
// llamada al canvas
const canvas = document.getElementById("miCanvas");
const ctx= canvas.getContext("2d");
// const
const nose = document.getElementById("nose");

ctx.fillStyle = '#000000';
ctx.fillRect(0,0,700,15);


ctx.innerText = "Porcetaje completado";
// var pormesa = fetch("dynamics/php/calificaciones/calificaciones.php")
// var respuesta = pormesa
//     .then((response)=>{
//         return response.json();
//     }).then((datosJson)=>{
//         ctx.fillRect(0,0,100,15);
//         console.log(datosJson);
//     }).catch((error)=>{
//         console.log(error);
//     });


