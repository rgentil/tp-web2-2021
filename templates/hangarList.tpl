{include file='templates/header.tpl'}

<div class="container">

    {if $admin}
    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
                <a class="btn btn-outline-primary" href="hangarAlta" role="button">Crear</a>
            </div>
        </div>
    {/if}

    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$hangares item=$hangar}
                    <li class="list-group-item list-group-item-secondary">
                        <a href="hangar/{$hangar->id_hangar}">{$hangar->nombre}</a> - Ocupación {$hangar->cantAviones} de {$hangar->capacidad}
                        {if $hangar->cantAviones < 1 && $admin}
                            - 
                            <a class="btn btn-outline-danger" href="deleteHangar/{$hangar->id_hangar}">Borrar</a> 
                            - 
                            <a class="btn btn-outline-success" href="hangarUpdate/{$hangar->id_hangar}">Actualizar</a>
                        {else}
                            {if $hangar->cantAviones > 0}
                                - 
                                <a class="btn btn-outline-info" href="avionesHangar/{$hangar->id_hangar}">Ver Aviones</a>
                            {/if}
                        {/if}
                        
                    </li>
                {/foreach}
            </ul>
        </div>

    </div>

    <div class="row mt-4 justify-content-md-center">
        <div class="col-md-8">
            <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
        </div>
    </div>
    
</div>

{include file='templates/footer.tpl'}