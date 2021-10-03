{include file='templates/header.tpl'}
    <div class="container">
        <div class="row">
            <h1> {$titulo_header} </h1>
                <div class="col-md-4">
                    <h1>Hangares</h1>
                    <a class="btn btn-outline-primary" href="hangares" role="button">
                        <img class="mb-2" src="img/hangares1.jpg" alt="Hangares" width="250" height="250">
                    </a>
                </div>
            
                <div class="col-md-4">
                    <h1>Aviones</h1>
                    <a class="btn btn-outline-primary" href="aviones" role="button">
                        <img class="mb-2" src="img/aviones1.jpg" alt="Aviones" width="250" height="250">
                    </a>
                </div>
            
                {if $admin}
                    <div class="col-md-4">
                        <h1>Usuarios</h1>
                        <a class="btn btn-outline-primary" href="usuarios" role="button">
                            <img class="mb-2" src="img/usuarios1.jpg" alt="Usuarios" width="250" height="250">
                        </a>
                    </div>                
                {/if}
            
        </div>
    </div>

{include file='templates/footer.tpl'}