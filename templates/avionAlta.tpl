{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_crear}</h1>
        <form action="createAvion" method="post">
            {if $mensaje_valores_requeridos != null}
                <div class="alert alert-danger" role="alert">
                    {$mensaje_valores_requeridos}
                </div>
            {/if} 
            <div class="row mb-3">
                <label for="idNombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idNombre" name="nombre" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idFabricante" class="col-sm-2 col-form-label">Fabricante</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idFabricante" name="fabricante" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="idTipo" class="col-sm-2 col-form-label">Tipo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idTipo" name="tipo" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="idListHangares">Hangar Disponible</label>
                <div class="col-sm-10">
                    <select class="form-select" id="idListHangares" name="idHangar" required>
                        {foreach from=$hangaresDisponibles item=$hangar}
                            <option value={$hangar->hIdHangar}>{$hangar->hNombre}</option>                            
                        {/foreach}
                    </select>
                </div>
            </div>        
            <button type="submit" class="btn btn-outline-primary"> Guardar</button>
        
        </form>
        
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