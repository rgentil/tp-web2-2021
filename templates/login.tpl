{include file='templates/header.tpl'}

<div class="container">

    <div class="row mt-4">
        <h1>{$titulo_login}</h1>

        <form action="loguear" method="post">
            
            <div class="row mb-3">
                <label for="idCodigo" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="idCodigo" name="codigo" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="idPass" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="Password" class="form-control" id="idPass" name="password" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-outline-primary"> Ingresar</button>
        
        </form>
        
    </div>

    <div class="row mt-4">
        <div class="col-1 col-sm-10">
            <a class="btn btn-outline-info" href="registro">Registrarse</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col col-sm-10">
            <h6 class="alert-success">{$mensajeRegExitoso}</h6>
        </div>
    </div>    
    
    <div class="row mt-4">
        <div class="col col-sm-10">
            <h6 class="alert-danger">{$mensaje}</h6>
        </div>
    </div>

</div>

{include file='templates/footer.tpl'}