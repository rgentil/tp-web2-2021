{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">

        <div class="col-md-4">
            <h1>{$titulo_crear}</h1>
            <form class="form-alta" action="createAvion" method="post">
                <input type="text" name="nombre" id="idNombre" placeholder="Nombre" required>
                <input type="text" name="fabricante" id="idFabricante">
                <input type="text" name="tipo" id="idTipo">
                <input type="submit" class="btn btn-primary" value="Guardar">
            </form>
        </div>

        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$aviones item=$avion}
                    <li class="list-group-item">
                        <a href="avion/{$avion->id_avion}">{$avion->nombre}</a> | {$avion->fabricante}
                        <a class="btn btn-danger" href="deleteAvion/{$avion->id_avion}">Borrar</a> - 
                        <a class="btn btn-success" href="updateAvion/{$avion->id_avion}">Actualizar</a>
                    </li>
                {/foreach}
            </ul>
        </div>

    </div>

    <a href="hangares" > Lista de Hangares </a> - <a href="home" > Aeródromo </a>
    
</div>



{include file='templates/footer.tpl'}