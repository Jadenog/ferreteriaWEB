<?php
include "conexion.php";
?>
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
    <body>
        <?php
            include "barra-navegacion.php"
        ?>

        <div id="container">
            <div id="recuadro">
            <form action="login.php" method="POST">
                <h1> iniciar sesion</h1>

                <div class="mb-1">
                    <label for="usuario" class="form-label"></label>
                    <input required type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario" aria-describedby="emailHelp">
                <div id="usuario" class="form-text"></div>

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
                <div class="mt-4"> 
                    <p style="color: white;" >aun no te has registrado ? <a href="registrar.php">registrarme</a></p>
                </div>
            </div>
        </div>

    </body>
</html>

<?php
function comprobar($usuario,$contraseña,$cusuarios,$conn){
    $nuevaURL = "inventario";
    $result = $conn->query("SELECT * FROM usuarios");    
    while($datos = $result->fetch_assoc()) {

        if($datos['usuario']==$usuario){
            if($datos['contraseña']==$contraseña){
                if($datos['id_cargo']== 1){
                    ?>
                        <div class='bg-success text-white border-bottom p-3 text-center fw-bold'>Te has logueado correctamente <br></div>";
                        <meta http-equiv="refresh" content="0;admin/gestion-inventario.php">
                    <?php

                }else{
                    if(($datos['id_cargo']== 2)){
                        
                        ?>
                            <div class='bg-success text-white border-bottom p-3 text-center fw-bold'>Te has logueado correctamente <br></div>";
                            <meta http-equiv="refresh" content="0;client/inventario.php">
                         <?php
                    }
                }

                
            }else{echo "<div class='bg-danger text-white border-bottom p-3 text-center fw-bold'>El email y/o la contraseña son incorrectas</div>";}
        }else{ $error= isset($error) ? $error : 0; if($cusuarios == ($error+1)){
            echo "<div class='bg-danger text-white border-bottom p-3 text-center fw-bold'>El email y/o la contraseña son incorrectas</div>";
            $error = 0;
        }else $error++;}
        }
    }
$usuario= isset($_POST['usuario']) ? $_POST['usuario'] : 0;
$contraseña= isset($_POST['contraseña']) ? $_POST['contraseña'] : 0;

$cusuarios = 0;
$result = $conn->query("SELECT * FROM usuarios");    
while($datos = $result->fetch_assoc()) {
    $cusuarios++;
}
if($usuario !==0 && $contraseña!==0){
    comprobar($usuario,$contraseña,$cusuarios,$conn);
}
?>