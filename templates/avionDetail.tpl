{include file='templates/header.tpl'}

    <div class="container">

        <div class="row mt-4">
            
            <h1 class="mb-4">{$avion->nombre}</h1>
            
            <h2>Fabricante: {$avion->fabricante}</h2>
            
            <h2>Tipo: {$avion->tipo}</h2>
            
            <h2>Hangar: {$avion->h_nombre}</h2>

        </div>
        
        <a href="aviones" > Lista de Aviones </a> - <a href="home" > Aeródromo </a>
    
    </div>

{include file='templates/footer.tpl'}