<?php
require('../conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del producto
    $query = "SELECT * FROM productos WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    $producto = mysqli_fetch_array($resultado);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "barra-navegacion-admin.php";
    include "auth-admin.php";
?>
    <div id="container">
        <div id="recuadro">
            <div class="container mt-5">
                <h2>Editar producto</h2>
                <form action="actualizar_producto.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">producto</label>
                        <input type="text" name="producto" class="form-control" value="<?php echo $producto['producto']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">marca</label>
                        <input type="text" name="marca" class="form-control" value="<?php echo $producto['marca']; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input type="int" name="cantidad" class="form-control" value="<?php echo $producto['cantidad']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="int" name="precio" class="form-control" value="<?php echo $producto['precio']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar</button>
                    <a href="inventario.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
