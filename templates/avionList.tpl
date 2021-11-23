{include file='templates/header.tpl'}

<div class="container ">
    {if $admin}
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
                <a class="btn btn-outline-primary" href="avionAlta" role="button">Crear</a>
            </div>
        </div>
    {/if}

    {if !$viene_hangar}
        {if $usuario_logueado != null}
            <div class="row mt-4 justify-content-md-center">
                <div class="col-md-8">
                    <h1>{$titulo_filtrado}</h1>
                    <form action="aviones" method="get">
                        <div class="row mb-3">
                            <label for="filtro_nombre" class="col-sm-2 col-form-label">Avión</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="filtro_nombre" name="filtro_nombre">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Filtrar</button>
                    </form>
                </div>    
            </div>

            <div class="row mt-4 justify-content-md-center">
                <div class="col-md-8">
                    <h1>{$titulo_paginacion}</h1>
                    <div class="col-md-8">
                            <a href="aviones/?pagenumero={$previous_page}">Anterior</a> - 
                            <a href="aviones/?pagenumero=1">Primero</a> - 
                        {if $pag_numero >= $total_pages}
                            <a href="aviones/?pagenumero=1">Siguiente</a>
                        {else}
                            <a href="aviones/?pagenumero={$next_page}">Siguiente</a>
                        {/if}
                    </div>   
                </div>   
            </div>
        
        {/if}
    {/if}

    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$aviones item=$avion}
                    <li class="list-group-item list-group-item-secondary">
                        <a href="avion/{$avion->id_avion}">{$avion->nombre}</a> | HANGAR {$avion->h_nombre}
                        {if $admin}
                            - 
                            <a class="btn btn-outline-danger" href="deleteAvion/{$avion->id_avion}">Borrar</a>
                            - 
                            <a class="btn btn-outline-success" href="avionUpdate/{$avion->id_avion}">Actualizar</a>
                            {if $avion->imagen != null}
                                - 
                                <a class="btn btn-outline-danger" href="deleteImagen/{$avion->id_avion}">Borrar Imágen</a>
                            {/if}
                        {/if}
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>
    
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
            <a class="btn btn-outline-secondary" href="hangares">Lista de Hangares</a>
            -
            <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
        </div>
    </div>
    
</div>

{include file='templates/footer.tpl'}