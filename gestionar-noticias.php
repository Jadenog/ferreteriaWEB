<?php
    include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></link>
    </title>
</head>
    <body>
        <?php
            include "barra-navegacion2.php"
        ?>
        <div id="container">
            <div id="recuadro">
                <form action="gestionar-noticias.php" method="POST">
                    <h1> añadir noticia</h1>

                    <div class="mb-1">
                        <label for="titular" class="form-label"></label>
                        <input required type="text" id="titular" name="titular" class="form-control" placeholder="titular de la noticia " aria-describedby="emailHelp">
                    <div id="titular" class="form-text"></div>

                    <div class="mb-1">
                        <label for="imagen" class="imagen"></label>
                        <input required type="text" id="imagen" name="imagen" class="form-control" placeholder="url imagen de la noticia" aria-describedby="emailHelp">
                    <div id="imagen" class="form-text"></div>
                    <div class="mt-3">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            
                            <button type="submit" class="btn btn-warning btn-lg">añadir noticia</button>

                            <a href="noticias.php">
                            <button type="button" class="btn btn-warning btn-lg">ver noticias </button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php 
function agregarnoticia($titular,$imagen,$conn){	
    if ($conn->query("INSERT INTO noticas (titular,imagen) VALUES ('$titular','$imagen')")){
        echo "<div class='bg-success text-white border-bottom p-3 text-center fw-bold'>has agregado una noticia correctamente </div>";
    }
}
$titular= isset($_POST['titular']) ? $_POST['titular'] : 0;
$imagen= isset($_POST['imagen']) ? $_POST['imagen'] : 0;

if($titular!==0 && $imagen!==0){
        agregarnoticia($_POST['titular'], $_POST['imagen'],$conn);
    }
?>