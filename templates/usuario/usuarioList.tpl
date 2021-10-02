{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col">
            <a class="btn btn-outline-primary" href="usuarioAlta" role="button">Crear</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$usuarios item=$usuario}
                    <li class="list-group-item">
                        <a href="usuario/{$usuario->id_usuario}">{$usuario->nombre}</a> - Rol {$usuario->rol}
                        {if $usuario_codigo != $usuario->codigo}
                            - 
                            <a class="btn btn-outline-danger" href="deleteUsuario/{$usuario->id_usuario}">Borrar</a> 
                        {/if}
                            - 
                            <a class="btn btn-outline-success" href="usuarioAlta/{$usuario->id_usuario}">Actualizar</a>
                    </li>
                {/foreach}
            </ul>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col">
            <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
        </div>
    </div>
    
</div>

{include file='templates/footer.tpl'}