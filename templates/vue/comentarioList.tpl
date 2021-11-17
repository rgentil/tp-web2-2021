{literal}
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
                <label class="col-sm-2 col-form-label" for="idComentario">Nombre</label>
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
        
            <p>
                <input class="btn btn-outline-primary" type="submit"value="Enviar">
            </p>
        </form>
    </div>

    <div class="row mt-4">
        <h1>{{ titulo }}</h1>
        <ul id="list-comentarios" class="list-group">
        </ul>
        <h4 class="text-primary">{{ mensaje }}</h4>
    </div>
{/literal}