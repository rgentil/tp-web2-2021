{include file='templates/header.tpl'}

<div class="container ">
    {if $admin}
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
                <a class="btn btn-outline-primary" href="avionAlta" role="button">Crear</a>
            </div>
        </div>
    {/if}
    
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$aviones item=$avion}
                    <li class="list-group-item list-group-item-secondary">
                        <a href="avion/{$avion->id_avion}">{$avion->nombre}</a> | {$avion->fabricante} | HANGAR {$avion->h_nombre}
                        {if $admin}
                            - 
                            <a class="btn btn-outline-danger" href="deleteAvion/{$avion->id_avion}">Borrar</a>
                            - 
                            <a class="btn btn-outline-success" href="avionUpdate/{$avion->id_avion}">Actualizar</a>
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