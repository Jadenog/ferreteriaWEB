<?php
include '../conexion.php'; // Conectar a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Query para eliminar el registro
    $sql = "DELETE FROM noticas WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar el registro.";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);

    // Redireccionar a la página principal después de eliminar
    header("Location: noticias.php");
    exit();
}
?>
