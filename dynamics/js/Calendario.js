var mesinfo=0;
const Calendario=document.getElementById("Calendario");
const Avanzar= document.getElementById("BotonAvanzar");
const Atras= document.getElementById("BotonAtras")

function ActualizarCalendario(){
    fetch("../../dynamics/php/Calendario.php?mesinfo="+mesinfo
    ).then((response)=>{
        return response.json();
    }).then((datos)=>{
        Calendario.innerHTML="";
        for(let valores of datos){
            let dia= document.createElement("div");
            dia.className="Dia"
            dia.innerHTML=valores.DiaNombre+"</br>"+valores.DiaNumero+"<br>"+valores.Mes+" "+valores.year;
            Calendario.appendChild(dia);
        }
    })
}
ActualizarCalendario();

Avanzar.addEventListener("click", ()=>{
    mesinfo--;
    ActualizarCalendario();
})
Atras.addEventListener("click", ()=>{
    mesinfo++;
    ActualizarCalendario();
})