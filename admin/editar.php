<?php
require('../conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos de la noticia
    $query = "SELECT * FROM noticas WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    $noticia = mysqli_fetch_array($resultado);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "barra-navegacion-admin.php"; 
include "auth-admin.php";?>
    <div id="container">
        <div id="recuadro">
            <div class="container mt-5">
                <h2>Editar Noticia</h2>
                <form action="actualizar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Titular</label>
                        <input type="text" name="titular" class="form-control" value="<?php echo $noticia['titular']; ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Imagen URL</label>
                        <input type="text" name="imagen" class="form-control" value="<?php echo $noticia['imagen']; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="<?php echo $noticia['fecha']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-warning">Actualizar</button>
                    <a href="noticias.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
