<!-- link donde voy a tomar las noticias: https://www.fierros.com.co/es/noticias?tags=8&items_per_page=9-->

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
        <h1> noticias activas</h1>
            <div class="mb-3">
                <a href="gestionar-noticias.php">
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-warning">agregar nueva noticia</button>
                    </div>
                </a>
            </div>
        <!--tabla -->
            <table class="table table-dark table-hover table table-bordered">
                <thead class="table-light">
                    <tr align='center'>
                        <th scope="col">id</th>    
                        <th scope="col">titular</th>
                        <th scope="col">imagen</th>
                        <th scope="col">fecha agregada</th>
                    </tr>
                </thead>
                <?php

                    require('conexion.php');
                    $query="SELECT * FROM noticas ORDER BY id";
                    $resultado=mysqli_query($conn,$query);

                    while ($extraido= mysqli_fetch_array($resultado)) { 

                        echo"<tr align='center'>";
                        echo "<td>".$extraido['id']."</td>";
                        echo "<td>".$extraido['titular']."</td>";
                        echo "<td><img src=".$extraido['imagen']." width=125px height=100px></td>";
                        echo "<td>".$extraido['fecha']."</td></tr>";
                    }
                ?>
            
        </div>
    </body>
</html>