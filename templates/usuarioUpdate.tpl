{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_update}</h1>
        <form action="updateUsuario" method="post">
            {if $mensaje_valores_requeridos != null}
                <div class="alert alert-danger" role="alert">
                    {$mensaje_valores_requeridos}
                </div>
            {/if}  
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
                <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type=" email" class="form-control" id="idEmail" name="email" value="{$usuario->email}" readonly>
                </div>
            </div>
            <!-- Ahora se puede editar el rol de un usuario.
            <div class="row mb-3">
                <label for="idCodigo" class="col-sm-2 col-form-label">Rol</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idCodigo" name="codigo" value="{$usuario->rol_descrip}" required>
                </div>
            </div>
            -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="idListRoles">Rol</label>
                <div class="col-sm-10">
                    <select class="form-select" id="idListRoles" name="rol" required>
                        {if $usuario->rol == 'Admin'} 
                            <option selected value='Admin'>Administrador</option>
                            <option value='Comun'>Común</option>
                        {else}
                            <option value='Admin'>Administrador</option>
                            <option selected value='Comun'>Común</option>
                        {/if}                        
                    </select>
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