{include file='templates/header.tpl'}

    <div class="container">
        
        <div class="row mt-4">
            <div class="col">
                <h2>Nombre : {$usuario->nombre}</h2>
                <h2>Código: {$usuario->codigo}</h2>
                <h2>Rol: {$usuario->rol_descrip}</h2>
                <h2>Email: {$usuario->email}</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <a class="btn btn-outline-secondary" href="usuarios">Lista de Usuarios</a>
                -
                <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
            </div>
        </div>
    </div>

{include file='templates/footer.tpl'}