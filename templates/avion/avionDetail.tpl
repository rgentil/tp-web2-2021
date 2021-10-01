{include file='templates/header.tpl'}

    <div class="container">

        <div class="row mt-4">
            <div class="col">
                <h2>Nombre : {$avion->nombre}</h2>
                <h2>Fabricante: {$avion->fabricante}</h2>
                <h2>Tipo: {$avion->tipo}</h2>
                <h2>Hangar: {$avion->h_nombre}</h2>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col">
                <a class="btn btn-outline-secondary" href="aviones">Lista de Aviones</a>
                -
                <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
            </div>
        </div>

    </div>

{include file='templates/footer.tpl'}