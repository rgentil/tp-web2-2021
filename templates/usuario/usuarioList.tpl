{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <div class="col">
            <a class="btn btn-outline-primary" href="usuarioCrud" role="button">Crear</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <h1>{$titulo_listado}</h1>
            <ul class="list-group">
                {foreach from=$usuarios item=$usuario}
                    <li class="list-group-item">
                        <a href="usuario/{$usuario->id_usuario}">{$usuario->nombre}</a> - Rol {$usuario->rol}
                            - 
                            <a class="btn btn-outline-danger" href="deleteUsuario/{$usuario->id_usuario}">Borrar</a> 
                            - 
                            <a class="btn btn-outline-success" href="usuarioCrud/{$usuario->id_usuario}">Actualizar</a>
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