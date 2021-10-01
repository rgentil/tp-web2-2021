{include file='templates/header.tpl'}
    <div class="container">
        <div class="row mt-4">
            <h1> {$titulo_header} </h1>
            <div class="row mt-4">
                <div class="col-2">
                    <a class="btn btn-outline-primary" href="hangares" role="button">Hangares</a>
                </div>
            </div>
            <div class="row mt-4 ">
                <div class="col-2">
                    <a class="btn btn-outline-primary" href="aviones" role="button">Aviones</a>
                </div>
            </div>
            {if $admin}
                <div class="row mt-4 ">
                    <div class="col-2">
                        <a class="btn btn-outline-primary" href="usuarios" role="button">Usuarios</a>
                    </div>
                </div>    
            {/if}
            
        </div>
    </div>

{include file='templates/footer.tpl'}