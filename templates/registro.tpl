{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_crear}</h1>
        <form action="registrarUsuario" method="post">
            
            <div class="row mb-3">
                <label for="idNombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idNombre" name="nombre" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idCodigo" class="col-sm-2 col-form-label">Código</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idCodigo" name="codigo" required>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="idEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="idEmail" name="email">
                </div>
            </div>

            <div class="row mb-3">
                <label for="idPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="idPassword" name="password" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="idListRoles">Rol</label>
                <div class="col-sm-10">
                    <select class="form-select" id="idListRoles" name="rol" required>
                        {if !$admin} 
                            <option selected value='Comun'>Común</option>
                        {else}
                            <option selected>Seleccione un rol...</option>
                            <option value='Admin'>Administrador</option>
                            <option value='Comun'>Común</option>
                        {/if}                        
                    </select>
                </div>
            </div>  
            
            <button type="submit" class="btn btn-outline-primary"> Guardar</button>
        
        </form>
        
    </div>

    <div class="row mt-4">
        <h6 class="alert-danger">{$mensaje}</h6>
    </div>  

    <div class="row mt-4">
        <div class="col">
            <a class="btn btn-outline-secondary" href="login">Login</a>
        </div>
    </div>
    
</div>

{include file='templates/footer.tpl'}