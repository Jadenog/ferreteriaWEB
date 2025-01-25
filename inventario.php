<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"></link>
    </title>
</head>
    <body>
        <?php
            include "barra-navegacion2.php"
        ?>

        <div id="margen-inventario" style="margin: 5% 10%">
        <h1> Inventario</h1>
        <!--buscador -->
        <div class="mb-4">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar producto" aria-label="Search">
                <button class="btn btn-warning" type="submit">Buscar</button>
            </form>
            </div>  
        <!--tabla -->
            <table class="table table-dark table-hover table table-bordered">
                <thead class="table-light">
                    <tr align='center'>
                        <th scope="col"></th>    
                        <th scope="col">Id</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <?php

                    require('conexion.php');
                    $query="SELECT * FROM productos ORDER BY id";
                    $resultado=mysqli_query($conn,$query);

                    while ($extraido= mysqli_fetch_array($resultado)) { 
                        ?>
                        <tr align='center'>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                </label>
                            </div>
                        </td>
                        <?php
                        echo "<td>".$extraido['id']."</td>";
                        echo "<td>".$extraido['producto']."</td>";
                        echo "<td>".$extraido['marca']."</td>";
                        echo "<td>".$extraido['cantidad']."</td>";
                        echo "<td>".$extraido['precio']."</td></tr>";
                    }
                ?>
            </table>
                <!--paginacion -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                        <a class="page-link">atras</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">siguiente</a>
                        </li>
                    </ul>
                </nav>
                <!-- boton comprar-->
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-warning">Comprar</button>
            </div>
            
        </div>
    </body>
</html>