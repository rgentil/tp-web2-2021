{include file='templates/header.tpl'}

    <div class="container">
        
        <div class="row mt-4">
        
            <h1 class="mb-4">{$hangar->nombre}</h1>
            
            <h2>Ubicación: {$hangar->ubicacion}</h2>
            
            <h2>Capacidad: {$hangar->capacidad}</h2>

        </div>
        
        <a href="hangares" > Lista de Hangares </a> - <a href="home" > Aeródromo </a>
    
    </div>

{include file='templates/footer.tpl'}