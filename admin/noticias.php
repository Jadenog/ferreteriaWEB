<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <script src="https://kit.fontawesome.com/879e1cefd1.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "barra-navegacion-admin.php"; ?>

    <div id="margen-inventario" style="margin: 5% 10%">
        <h1>Noticias Activas</h1>
        <div class="mb-3">
            <a href="gestionar-noticias.php">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-warning">Agregar Nueva Noticia</button>
                </div>
            </a>
        </div>

        <!-- Tabla -->
        <table class="table table-dark table-hover table-bordered">
            <thead class="table-light">
                <tr align='center'>
                    <th scope="col">ID</th>    
                    <th scope="col">Titular</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha Agregada</th>
                    <th scope="col"><i class="fa-regular fa-trash-can"></i></th>
                    <th scope="col"><i class="fa-solid fa-gear"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('../conexion.php');
                $query = "SELECT * FROM noticas ORDER BY id";
                $resultado = mysqli_query($conn, $query);

                while ($extraido = mysqli_fetch_array($resultado)) { 
                    echo "<tr align='center'>";
                    echo "<td>".$extraido['id']."</td>";
                    echo "<td>".$extraido['titular']."</td>";
                    echo "<td><img src='".$extraido['imagen']."' width='125px' height='100px'></td>";
                    echo "<td>".$extraido['fecha']."</td>";
                    echo "<td>
                            <form action='eliminar.php' method='POST' onsubmit='return confirm(\"¿Seguro que quieres eliminar este registro?\");'>
                                <input type='hidden' name='id' value='".$extraido['id']."'>
                                <button type='submit' class='btn btn-danger'>Eliminar</button>
                            </form>
                          </td>";
                    echo "<td>
                            <a href='editar.php?id=".$extraido['id']."' class='btn btn-warning'>Editar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
