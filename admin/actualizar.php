<?php
require('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titular = $_POST['titular'];
    $imagen = $_POST['imagen'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE noticas SET titular='$titular', imagen='$imagen', fecha='$fecha' WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Noticia actualizada correctamente');
                window.location.href = 'noticias.php';
              </script>";
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
}
?>
