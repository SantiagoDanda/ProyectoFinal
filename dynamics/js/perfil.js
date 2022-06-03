// constates
    // Esta es la constante de Perfil.html
const perfil = document.getElementById("textoPerfil");
const fotoPerfilF = document.getElementById("fotoPerfilF");


// DATOS de la base de datos
var maestro = true;
var nombre = "Faraon Love Shady";
var grupo = "516";
var idExterno = "209090909";
var idInterno = "209090900";
var contacto = "https://www.youtube.com/results?search_query=acto+acto+pide+contacto";
var comentarioExtra = "Duro dos horas";
var cursos = ["mate", "Cantantes", "RomperCamas"];
var longitudCursos = 3;


// variables que si son variables
var i=0;
var publico = true;

var email = "Faraon@gmail.com";

if(idExterno == idInterno){
    publico = true;
}
else{
    publico = false;
}
if(maestro == true){
    fotoPerfilF.innerHTML = "Foto de Faraón";
    perfil.innerHTML += "<u>"+nombre+"</u>";
    perfil.innerHTML += "<br/><br/><br/><strong>Gruepo: </strong>"+ grupo;
    perfil.innerHTML += "<br/>contacto: <a href='"+contacto+"'>"+contacto+"</a>";

    perfil.innerHTML += "<br/><br/>Cursos en los que participa:<br/>";
    for(i = 0; i <  longitudCursos; i++){
        perfil.innerHTML += "- "+cursos[i] + "<br/>";
    }

    perfil.innerHTML += "<br/>Información sobre mí:<br/>"+ comentarioExtra;
    if(publico != false){
        perfil.innerHTML += "<br/><br/>"+email;
        perfil.innerHTML += "<br/>"+ idInterno;
    }
    // aquí iría una etiqueta img
}else{

}