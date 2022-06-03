// constates
    // Esta es la constante de Perfil.html
const perfil = document.getElementById("textoPerfil");
const fotoPerfilF = document.getElementById("fotoPerfilF");


// DATOS de la base de datos
var nombre = "El Danda";
var grupo = "516";
var idExterno = "209090909";
var idInterno = "209090900";
var contacto = "https://www.youtube.com/results?search_query=acto+acto+pide+contacto";
var comentarioExtra = "Duro dos horas";
var cursos = ["mate", "Cantantes", "RomperCamas"];
var longitudCursos = 3;
//redirecciona a la imagen y luego pega la imagen que es
var archivoImg = "../../statics/media/img/"+ "Faraon.jpeg";
var maestro = false;

// toma la primer letra del nombre
inicial = nombre.charAt(0);
inicial = inicial.toUpperCase();

// comentar estas lineas cuando se agregue base de datos
console.log(inicial);
archivoImg = "";

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
    if(archivoImg != ''){
        fotoPerfilF.innerHTML = "<img id='perfil' alt='Foto perfil' src='"+archivoImg+"'>";
    }else{
        fotoPerfilF.innerHTML ="<div id= 'perfilSinFoto' class='tamano'><strong>"+inicial+"</strong></div>";
    } 
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
    if(archivoImg != ''){
        fotoPerfilF.innerHTML = "<img id='perfil' alt='Foto perfil' src='"+archivoImg+"'>";
    }else{
        fotoPerfilF.innerHTML ="<div id= 'perfilSinFoto' class='tamano'><strong>"+inicial+"</strong></div>";
    } 
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
        perfil.innerHTML += "<br/>"+ idExterno;
    }
}