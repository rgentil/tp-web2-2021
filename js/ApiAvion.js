"use strict"

let app = new Vue({
    el: "#id-div-aviones",
    data:{
        titulo: "Lista de aviones desde la api usando Vue", //this->assign("titulo,"Aviones desde api");
        aviones: [],
    }
});

const API_URL = "http://localhost/web2/aerodromo/api/aviones";

async function getAviones(){
    //hago el fetch para traer todos los aviones
    try {
        let response = await fetch(API_URL);
        let aviones = await response.json();
        //render(aviones);

        app.aviones = aviones;
    } catch (error) {
        
    }   
}
/*
function render(aviones){
    let lista = document.querySelector("#list-aviones");
    lista.innerHTML = "";
    for (let avion of aviones){
        let html = `<li class="list-group-item">
                        <a href="avion/${avion.id_avion}">${avion.nombre}</a>
                    </li>`
        lista.innerHTML += html;
    }               
    
}
*/

getAviones();