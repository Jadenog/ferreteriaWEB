<?php
    include "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css"></link>
    </title>
</head>
    <body>
        <?php
            include "barra-navegacion-admin.php"
        ?>
        <div id="container">
            <div id="recuadro">
                <form action="gestion-inventario.php" method="POST">
                    <h1> añadir producto</h1>

                    <div class="mb-1">
                        <label for="producto" class="form-label"></label>
                        <input required type="text" id="producto" name="producto" class="form-control" placeholder="producto" aria-describedby="emailHelp">
                    <div id="producto" class="form-text"></div>

                    <div class="mb-1">
                        <label for="marca" class="marca"></label>
                        <input required type="text" id="marca" name="marca" class="form-control" placeholder="marca" aria-describedby="emailHelp">
                    <div id="marca" class="form-text"></div>

                    <div class="mb-1">
                        <label for="cantidad" class="form-label"></label>
                        <input required type="number" id="cantidad" name="cantidad" class="form-control" placeholder="cantidad" aria-describedby="emailHelp">
                    <div id="cantidad" class="form-text"></div>

                    <div class="mb-1">
                        <label for="precio" class="precio"></label>
                        <input required type="number" id="precio" name="precio" class="form-control" placeholder="precio" aria-describedby="emailHelp">
                    <div id="precio" class="form-text"></div>

                    <div class="mt-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning btn-lg">añadir producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php 
function agregarproducto($producto,$marca,$cantidad,$precio,$conn){	
    if ($conn->query("INSERT INTO productos (producto,marca,cantidad,precio) VALUES ('$producto','$marca','$cantidad','$precio')")){
        echo "<div class='bg-success text-white border-bottom p-3 text-center fw-bold'>has agregado un producto  correctamente </div>";
    }
}
$producto= isset($_POST['producto']) ? $_POST['producto'] : 0;
$marca= isset($_POST['marca']) ? $_POST['marca'] : 0;
$cantidad= isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
$precio= isset($_POST['precio']) ? $_POST['precio'] : 0;

if($producto!==0 && $marca!==0 && $cantidad!==0 && $precio!==0){
    if($cantidad>0 && $precio>0){
        agregarproducto($_POST['producto'], $_POST['marca'],$_POST['cantidad'],$_POST['precio'],$conn);
    }else{
        echo "<div class='bg-danger text-white border-bottom p-3 text-center fw-bold'>los numeros de cantidad y precio no pueden ser negativos</div>";
    }
    
}
?>