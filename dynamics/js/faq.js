/*--------------------------------------- luca js de faq --------------------------------------------*/ 
/* Funcion que detecta todos los div en el html y detecta cuando le das click muetra la respuesta de la pregunta*/
function faq(){
const faqDivs = document.querySelectorAll('.faq');/* const que detecta todos los divs*/ 
faqDivs.forEach((div) => {
    div.addEventListener('click', (e) => {/* escucha si le das click al div*/ 
        e.target.closest('.faq').classList.toggle('active');/* si le da click lo muestra*/
    });
 });
}
faq();