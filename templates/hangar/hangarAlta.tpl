{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_crear}</h1>
        <form action="createHangar" method="post">
            
            <div class="row mb-3">
                <label for="idNombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idNombre" name="nombre" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idUbicacion" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idUbicacion" name="ubicacion" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="idCapacidad" class="col-sm-2 col-form-label">Capacidad</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="idCapacidad" name="capacidad" required>
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