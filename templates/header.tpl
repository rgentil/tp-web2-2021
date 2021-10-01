<!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="{BASE_URL}" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>{$titulo_header}</title>
    </head>
    <body>
        {if $usuario_logueado != null}
            <div class="container">
                <div class="row mt-4"> 
                    <div class="col-md-8">
                        {$usuario_logueado} <a class="btn btn-outline-primary" href="logout" role="button">Log Out</a>                
                    <div>
                </div>
            </div>    
        {/if}
        
    </div>

    