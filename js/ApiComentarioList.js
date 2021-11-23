"use strict"

document.addEventListener("DOMContentLoaded", iniciarPagina);

function iniciarPagina(){
    
    const API_URL = 'http://localhost/web2/aerodromo/api/aviones/';

    let app = new Vue({
        el: '#id-div-comentario-list',
        data:{
            //Formulario de carga
            titulo_comentario: 'Comentarios', 
            mensaje: '',
            errors: [],
            idComentario: null,
            idPuntuacion: null,
            //Filtrar comentario
            titulo_filtro: 'Filtrar comentario por puntuación',
            idFiltroPuntos: null,
            //Ordenamiento
            titulo_orden: 'Ordenarar comentarios',
            idCampo: null,
            idOrden: null,
            //Listado de comentarios
            titulo: 'Lista de comentarios', 
            permiteComentar: false
        },
        methods:{
            agregarComentario: 
                function (e) {
                    e.preventDefault();
                    this.errors = [];
                    this.mensaje = '';
                    if (this.idComentario && this.idPuntuacion) {
                        let comentario = {
                                        "descripcion": this.idComentario, 
                                        "puntuacion": this.idPuntuacion, 
                                        "id_usuario": usuario_id.value,
                                        "id_avion": idAvion.value 
                                        };                            
                        this.idComentario = null;
                        this.idPuntuacion = null;
                        agregarComentario(comentario);   
                    }else{
                        if (!this.idComentario) {
                            this.errors.push('Ingrese Comentario.');
                        }
                        if (!this.idPuntuacion) {
                            this.errors.push('Ingrese Puntuación.');
                        }
                    }
                },
            filtrarComentario:
                function (e){
                    e.preventDefault();
                    this.errors = [];
                    this.mensaje = '';
                    getComentarios(this.idFiltroPuntos,this.idCampo, this.idOrden)
                },
            ordenar:
                function (e){
                    e.preventDefault();
                    this.errors = [];
                    this.mensaje = '';                    
                    getComentarios(this.idFiltroPuntos, this.idCampo, this.idOrden);
                },
            limpiar:
                function (e){
                    e.preventDefault();
                    this.errors = [];
                    this.mensaje = '';
                    this.idComentario = null;
                    this.idPuntuacion = null;
                    this.idFiltroPuntos = null;
                    this.idCampo = null;
                    this.idOrden = null;
                    getComentarios(this.idFiltroPuntos, this.idCampo, this.idOrden);
                }
          }

    });
    let ulComentarios = document.getElementById("list-comentarios");
    let usuario_logueado = document.getElementById('usuario_logueado');
    let admin = document.getElementById('admin');
    let idAvion = document.getElementById('id_avion');
    let usuario_id = document.getElementById('usuario_id');
    
    app.permiteComentar = false;
    if (usuario_logueado != null && usuario_logueado.value != '') {
        app.permiteComentar = true;
    }
    
    getComentarios();

    async function getComentarios(filtro, ordenCampo, ordenDireccion){
        if (idAvion != null || idAvion.value != ''){
            try {
                ulComentarios.innerHTML = '';
                let url = `${API_URL}${idAvion.value}/comentarios`;
                if (ordenCampo != null && ordenCampo != ''){
                    if (ordenDireccion != null && ordenDireccion != ''){
                        url+=`?ordenCampo=${ordenCampo}&ordenDireccion=${ordenDireccion}`
                    }else{
                        url+=`?ordenCampo=${ordenCampo}`
                    }
                }else{
                    if (ordenDireccion != null && ordenDireccion != ''){
                        url+=`?ordenDireccion=${ordenDireccion}`
                    }else{
                        url+=`?ordenCampo=puntuacion&ordenDireccion=asc`
                    }
                }

                if (filtro != null && filtro != ''){
                    url += `&filtro=${filtro}`;
                }

                let response = await fetch(url);

                if (response.ok && response.status == 200) {
                    let comentarios = await response.json();
                    ulComentarios.innerHTML = '';
                    for (let comentario of comentarios) {
                        let li = document.createElement("li");
                        li.classList.add("list-group-item");
                        li.classList.add("list-group-item-secondary");
                        li.innerHTML = `${comentario.descripcion} - Valoración - ${comentario.puntuacion} / 5  `
                        if (admin != null && admin.value != '') {
                            let btnEliminar = document.createElement("button");
                            btnEliminar.classList.add("btn");
                            btnEliminar.classList.add("btn-outline-danger");
                            btnEliminar.innerHTML = 'Eliminar';
                            btnEliminar.addEventListener("click", (event) => {
                                event.preventDefault;
                                eliminarComentario(comentario.id_comentario);
                            });

                            li.appendChild(btnEliminar);
                        }
                        ulComentarios.appendChild(li);
                    }
                }else{
                    ulComentarios.innerHTML = '';
                    //app.mensaje = 'Error en la conexión';
                }
            } catch (error) {
                app.mensaje = error;
            }   
        }        
    }

    async function eliminarComentario(id) {
        app.mensaje = '';
        try {
            let response = await fetch(`${API_URL}comentarios/${id}`, {
                "method": "DELETE"
            });
            if (response.ok && response.status == 200) {
                app.mensaje =`Se elimino el comentario ${id}`;
                getComentarios();
            }           
        } catch (error) {
            app.mensaje = error;
        }
    }

    async function agregarComentario(comentario) {
        try {
            let response = await fetch(`${API_URL}comentarios`, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(comentario)
            });
            if (response.ok) {
                app.mensaje = 'Se creo el comentario correctamente'; 
                getComentarios();
            } else {
                app.mensaje = 'No se pudo crear el comentario'; 
            }
        } catch (error) {
            app.mensaje = 'Error en la conexión';
        }
    }
}