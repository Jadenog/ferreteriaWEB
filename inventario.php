<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/query.min.js"></script>
</head>
<body>
    <?php include "barra-navegacion2.php"; ?>

    <div id="margen-inventario" style="margin: 5% 10%">
        <h1>Inventario</h1>
        
        <!-- Buscador -->
        <div class="mb-4">
            <form class="d-flex" role="search">
                <input onkeypress="buscar_ahora($('#search').val());" class="form-control me-2" type="search" name="search" id="search" placeholder="Buscar producto" aria-label="Search">
                <button class="btn btn-warning" type="submit">Buscar</button>
            </form>
        </div>  

        <script type="text/javascript">
            function buscar_ahora(buscar){
                var parametros = { "buscar" : buscar};
                $.ajax({
                    data:parametros,
                    type: 'POST',
                    url: 'buscador.php',

                    success: function(data){
                        document.getElementById("datos_buscador").innerHTML = data;
                    }
                });
            }
            </script>
        
        <!-- Tabla -->
        <table class="table table-dark table-hover table-bordered">
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

                // Configuración de paginación
                $numPagina = 10; // Número de registros por página
                $pagina = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                if ($pagina < 1) $pagina = 1;
                $inicio = ($pagina - 1) * $numPagina;

                // Obtener el total de registros
                $queryTotal = "SELECT COUNT(*) as total FROM productos";
                $resultadoTotal = mysqli_query($conn, $queryTotal);
                $totalRegistros = mysqli_fetch_assoc($resultadoTotal)['total'];

                // Calcular el total de páginas
                $totalPaginas = ceil($totalRegistros / $numPagina);

                // Consulta con LIMIT para la paginación
                $query = "SELECT * FROM productos ORDER BY id LIMIT $inicio, $numPagina";
                $resultado = mysqli_query($conn, $query);

                while ($extraido = mysqli_fetch_array($resultado)) { 
                    ?>
                    <tr align='center'>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2"></label>
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

        <!-- Paginación -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $pagina - 1 ?>">Atrás</a>
                </li>
                
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= ($pagina == $i) ? 'active ' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?= ($pagina >= $totalPaginas) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $pagina + 1 ?>">Siguiente</a>
                </li>
            </ul>
        </nav>
        
        <!-- Botón comprar -->
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-warning">Comprar</button>
        </div>
    </div>
</body>
</html>
