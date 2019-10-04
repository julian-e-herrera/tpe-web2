"use strict"
function Comprobar(){
    let inputNombre = document.getElementById('nombre');
    let inputEmail = document.getElementById('email');
    let inputComentario = document.getElementById("comentario").value;
    let texto = "Hubo error en: ";
    let genericError = false;
    let checking;
    if(Errores(inputNombre) == false){
        texto = texto.concat("*Nombre ");
        genericError = true;
    }
    if(Errores(inputEmail) == false){
        texto = texto.concat( "*Email ");
        genericError = true;
    }
    if(Errores(inputComentario) == false){
        texto = texto.concat("*Comentario ");
        genericError = true;
    }
    checking = inputState();
    if(checking == false){
        texto = texto.concat( "*Ingrese el texto ");
        genericError = true;
    }
    if(genericError == false){
        alert("Su comentario fue enviado con éxito. Gracias por su tiempo!");
        location.reload();
    }
    else{
        alert(texto);
    }
}

function Errores(comprobado){
    if(comprobado.value == ""){
        return false;
    }
    else{
        return true;
    }
}

function inputState(){
    let checkboxname = document.getElementById("Robot").value;
    let algo = document.getElementById("captcha").innerHTML;
    if(checkboxname===algo){
        return true;
    }
    else{
        return false;
    }
}

let subirComentario = document.getElementById("SubirComentario");
subirComentario.addEventListener("click",Comprobar);