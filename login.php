<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></link>
    </title>
</head>
    <body div="fondo-login">
        <?php
            include "barra-navegacion.php"
        ?>

        <div id="container">
            <div id="recuadro">
            <form action="login.php" method="POST">
                <h1> iniciar sesion</h1>

                <div class="mb-1">
                    <label for="email" class="form-label"></label>
                    <input required type="email" id="email" name="email" class="form-control" placeholder="correo electronico" aria-describedby="emailHelp">
                <div id="email" class="form-text"></div>

                <div class="mb-1">
                    <label for="password" class="form-label"></label>
                    <input required type="password" id="contraseña" name="contraseña" class="form-control" placeholder="contraseña" aria-describedby="emailHelp">
                <div id="contraseña" class="form-text"></div>

                <div class="mt-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg">iniciar sesion</button>
                    </div>
                </div>
            </form>
            </div>
        </div>

    </body>
</html>