{include file='templates/header.tpl'}

    <div class="container">
        
        <div class="row mt-4">
            <div class="col">
                <h2>Nombre : {$hangar->nombre}</h2>
                <h2>Ubicación: {$hangar->ubicacion}</h2>
                <h2>Capacidad: {$hangar->capacidad}</h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <a class="btn btn-outline-secondary" href="hangares">Lista de Hangares</a>
                -
                <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
            </div>
        </div>
    </div>

{include file='templates/footer.tpl'}