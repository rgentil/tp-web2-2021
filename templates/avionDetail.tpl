{include file='templates/header.tpl'}

    <div class="container">

        <div class="row mt-4">
            <div class="col">
                <h2>Nombre : {$avion->nombre}</h2>
                <h2>Fabricante: {$avion->fabricante}</h2>
                <h2>Tipo: {$avion->tipo}</h2>
                <h2>Hangar: {$avion->h_nombre}</h2>
                <input type="hidden" id="id_avion" name="id_avion" value={$avion->id_avion} required>
            </div>
        </div>
        
        <div id="id-div-comentario-list" class="row mt-4">
            {include file='templates/vue/comentarioList.tpl'}
        </div>

        <div class="row mt-4">
            <div class="col">
                <a class="btn btn-outline-secondary" href="aviones">Lista de Aviones</a>
                -
                <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
            </div>
        </div>

    </div>
<script text="text/javascript" src="js/ApiComentarioList.js"></script>
{include file='templates/footer.tpl'}