{literal}
    
    <!-- Agregar un nuevo comentarios-->
    <div v-if="permiteComentar" class="row mt-4">
        <h1>{{ titulo_comentario }}</h1>
        <form @submit="agregarComentario" >
            <p v-if="errors.length">
                <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p>

            <p>
                <label class="col-sm-2 col-form-label" for="idComentario">Comentario</label>
                <input class="form-control" id="idComentario" v-model="idComentario" type="text" name="idComentario">
            </p>
            
            <p>
                <label class="col-sm-2 col-form-label" for="idPuntuacion">Puntuacion</label>
                <select class="form-select" id="idPuntuacion" v-model="idPuntuacion" name="idPuntuacion">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </p>
        
            <p v-show="idComentario">
                <button class="btn btn-outline-primary" type="submit">Guardar</button>
            </p>
        </form>
    </div>

    <!-- Filtrado de comentarios-->
    <div v-if="permiteComentar" class="row mt-4">
        <h1>{{ titulo_filtro }}</h1>
        <form >
            <p>
                <label class="col-sm-2 col-form-label" for="idFiltroPuntos">Puntuacion</label>
                <select class="form-select" id="idFiltroPuntos" v-model="idFiltroPuntos" name="idFiltroPuntos">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </p>

            <p>
                <button type="button" class="btn btn-outline-primary" @click="filtrarComentario">Filtrar</button>
            </p>
        </form>
    </div>

    <!-- Orden en que se muestra los comentarios de comentarios-->
    <div v-if="permiteComentar" class="row mt-4">
        <h1>{{ titulo_orden }}</h1>        
        <p>
            <label class="col-sm-2 col-form-label" for="idCampo">Campo</label>
            <select class="form-select" id="idCampo" v-model="idCampo" name="idCampo">
                <option value="descripcion">Comentario</option>
                <option value="puntuacion">Puntos</option>
            </select>
        </p>
        <p>
            <label class="col-sm-2 col-form-label" for="idOrden">Orden</label>
            <select class="form-select" id="idOrden" v-model="idOrden" name="idOrden">
                <option value="asc">Asc</option>
                <option value="desc">Desc</option>
            </select>
        </p>

        <p>
            <button type="button" class="btn btn-outline-primary" @click="ordenar">Ordenar</button>
        </p>
    </div>
    
    <p v-if="permiteComentar">
        <button type="button" class="btn btn-outline-primary" @click="limpiar">Limpiar orden y filtros</button>
    </p>

    <!-- Listado de comentarios-->
    <div class="row mt-4">
        <h1>{{ titulo }}</h1>
        <ul id="list-comentarios" class="list-group">
        </ul>
        <h4 class="text-primary">{{ mensaje }}</h4>
    </div>
{/literal}