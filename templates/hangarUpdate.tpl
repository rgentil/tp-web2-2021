{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_update}</h1>
        <form action="updateHangar" method="post">
            {if $mensaje_valores_requeridos != null}
                <div class="alert alert-danger" role="alert">
                    {$mensaje_valores_requeridos}
                </div>
            {/if}  
            <input type="hidden" class="form-control" id="id" name="id" value={$hangar->id_hangar} required>
            
            <div class="row mb-3">
                <label for="idNombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idNombre" name="nombre" value="{$hangar->nombre}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idUbicacion" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idUbicacion" name="ubicacion" value="{$hangar->ubicacion}" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="idCapacidad" class="col-sm-2 col-form-label">Capacidad</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="idCapacidad" name="capacidad" value="{$hangar->capacidad}" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-outline-primary"> Guardar</button>
        
        </form>
        
    </div>

    <div class="row mt-4">
        <div class="col">
            <a class="btn btn-outline-secondary" href="hangares">Lista de hangares</a>
            -
            <a class="btn btn-outline-secondary" href="home">Aeródromo</a>
        </div>
    </div>
    
</div>

{include file='templates/footer.tpl'}