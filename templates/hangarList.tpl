{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h1>{$titulo_crear}</h1>
            <form class="form-alta" action="createHangar" method="post">
                <input type="text" name="nombre" id="idNombre" placeholder="Nombre" required>
                <input type="text" name="ubicacion" id="idUbicacion" required>
                <input type="number" name="Capacidad" id="idCapacidad" required>
                <input type="submit" class="btn btn-primary" value="Guardar" >
            </form>
        </div>

        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$hangares item=$hangar}
                    <li class="list-group-item">
                        <a href="hangar/{$hangar->id_hangar}">{$hangar->nombre}</a> - {$hangar->ubicacion} - 
                        <a class="btn btn-danger" href="deleteHangar/{$hangar->id_hangar}">Borrar</a> - 
                        <a class="btn btn-success" href="updateHangar/{$hangar->id_hangar}">Actualizar</a>
                        <a class="btn btn-success" href="avionesHangar/{$hangar->id_hangar}">Ver Aviones</a>
                    </li>
                {/foreach}
            </ul>
        </div>

    </div>

    <a href="home" > Aeródromo </a>
    
</div>



{include file='templates/footer.tpl'}