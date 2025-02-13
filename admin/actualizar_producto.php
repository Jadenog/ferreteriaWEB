<?php
require('../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $marca = $_POST['marca'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $query = "UPDATE productos SET producto='$producto', marca='$marca', cantidad='$cantidad', precio='$precio' WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('producto actualizado correctamente');
                window.location.href = 'inventario.php';
              </script>";
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
}
?>