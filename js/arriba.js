"use strict"

function Subir() {
    window.scrollTo(0, top);
}

let irArriba = document.getElementsByClassName("irarriba");
for (let i = 0; i < irArriba.length; i++) {
    irArriba[i].addEventListener("click", Subir);
};

