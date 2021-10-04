<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="{BASE_URL}" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
        <title>{$titulo_header}</title>
    </head>
    <body>

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="home" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Aerodromo"><use xlink:href="#bootstrap"/></svg>
            </a>
            {if $usuario_logueado != null}
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item"><a href="home" class="nav-link">Aeródromo</a></li>
                    <li class="nav-item"><a href="hangares" class="nav-link">Hangares</a></li>
                    <li class="nav-item"><a href="aviones" class="nav-link">Aviones</a></li>
                    {if $admin}
                        <li class="nav-item"><a href="usuarios" class="nav-link">Usuarios</a></li>
                    {/if}
                    
                </ul>
            {/if}
            <div class="col-md-3 text-end">
                {if $usuario_logueado != null}
                    {$usuario_logueado} <a class="btn btn-outline-primary" href="logout" role="button">Log Out</a>
                {/if}
            </div>
        </header>

    