<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/879e1cefd1.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include "barra-navegacion2.php"; ?>

    <div id="margen-inventario" style="margin: 5% 10%">
        <h1>Inventario</h1>

        <!-- Buscador -->
        <div class="mb-4">
            <form class="d-flex" onsubmit="return false;">
                <input onkeyup="buscar_ahora();" class="form-control me-2" type="search" id="search" placeholder="Buscar producto">
                <button class="btn btn-warning" onclick="buscar_ahora();">Buscar</button>
            </form>
        </div>  

        <script>
            function buscar_ahora(){
                var buscar = $("#search").val();
                $.ajax({
                    type: 'POST',
                    url: 'buscador.php',
                    data: { buscar: buscar },
                    success: function(data){
                        $("#datos_buscador").html(data);
                    }
                });
            }
        </script>

        <!-- Resultados de búsqueda -->
        <div id="datos_buscador"></div>

        <!-- Tabla completa (solo se muestra si no hay búsqueda activa) -->
        <div id="tabla_inventario">
            <table class="table table-dark table-hover table-bordered">
                <thead class="table-light">
                    <tr align='center'>
                        <th scope="col"><i class="fa-solid fa-cart-shopping"></i></th>    
                        <th scope="col">Id</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <?php
                    require('../conexion.php');

                    $numPagina = 10;
                    $pagina = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
                    if ($pagina < 1) $pagina = 1;
                    $inicio = ($pagina - 1) * $numPagina;

                    $queryTotal = "SELECT COUNT(*) as total FROM productos";
                    $resultadoTotal = mysqli_query($conn, $queryTotal);
                    $totalRegistros = mysqli_fetch_assoc($resultadoTotal)['total'];
                    $totalPaginas = ceil($totalRegistros / $numPagina);

                    $query = "SELECT * FROM productos ORDER BY id LIMIT $inicio, $numPagina";
                    $resultado = mysqli_query($conn, $query);

                    while ($extraido = mysqli_fetch_array($resultado)) { 
                        ?>
                        <tr align='center'>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
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
        </div>

        <!-- Paginación -->
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($pagina <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $pagina - 1 ?>">Atrás</a>
                </li>
                
                <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                    <li class="page-item <?= ($pagina == $i) ? 'active' : '' ?>">
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
