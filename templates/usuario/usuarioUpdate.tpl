{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_crear}</h1>
        <form action="updateUsuario" method="post">
            
            <input type="hidden" class="form-control" id="id" name="id" value={$usuario->id_usuario} required>

            <div class="row mb-3">
                <label for="idNombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idNombre" name="nombre" value="{$usuario->nombre}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idCodigo" class="col-sm-2 col-form-label">Código</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idCodigo" name="codigo" value="{$usuario->codigo}" required readonly>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idCodigo" class="col-sm-2 col-form-label">Rol</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idCodigo" name="codigo" value="{$usuario->rol_descrip}" required readonly>
                </div>
            </div>
            
            <button type="submit" class="btn btn-outline-primary"> Guardar</button>
        
        </form>
        
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