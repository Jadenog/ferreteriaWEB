<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrarme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></link>
    </title>
</head>
    <body>
        <?php
            include "barra-navegacion.php"
        ?>

        <div id="container">
            <div id="recuadro">
            <form action="registrar.php" method="POST">
                <h1> registrarme</h1>

                <div class="mb-1">
                    <label for="correo" class="form-label"></label>
                    <input required type="email" id="correo" name="correo" class="form-control" placeholder="correo electronico" aria-describedby="emailHelp">
                <div id="correo" class="form-text"></div>

                <div class="mb-1">
                    <label for="password" class="form-label"></label>
                    <input required type="password" id="contraseña" name="contraseña" class="form-control" placeholder="contraseña" aria-describedby="emailHelp">
                <div id="contraseña" class="form-text"></div>

                <div class="mt-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning btn-lg">registrarse</button>
                    </div>
                </div>
            </form>
                <div class="mt-4"> 
                    <p style="color: white;" >ya tengo una cuenta ? <a href="login.php">iniciar sesion</a></p>
                </div>
            </div>
        </div>

    </body>
</html>
<?php 
function agregarusuario($correo,$contraseña,$conn){	
    if ($conn->query("INSERT INTO usuarios (correo,contraseña) VALUES ('$correo','$contraseña')")){
        echo "<div class='bg-success text-white border-bottom p-3 text-center fw-bold'>Te has registrado correctamente </div>";
    }
}
$correo= isset($_POST['correo']) ? $_POST['correo'] : 0;
$contraseña= isset($_POST['contraseña']) ? $_POST['contraseña'] : 0;
//$admin1= isset($_POST['admin1']) ? $_POST['admin1'] : 0;



if($correo!==0 && $contraseña!==0 ){
    agregarusuario($_POST['correo'], $_POST['contraseña'],$conn);
}
?>