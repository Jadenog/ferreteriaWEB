<?php
//session_start();
include "barra-navegacion2.php";
include "auth-cliente.php";
require('../conexion.php');

if (!isset($_POST['productos']) || count($_POST['productos']) == 0) {
    echo "<script>
            alert('No hay productos para confirmar');
            window.location.href='inventario.php';
          </script>";
    exit;
}

$productos = $_POST['productos'];           // ids seleccionados
$cantidades = $_POST['cantidad'] ?? [];     // array id => cantidad

// --- INICIO TRANSACCIÓN ---
mysqli_begin_transaction($conn);

try {

    // 1) VALIDAR STOCK
    foreach ($productos as $idProducto) {

        $idProducto = intval($idProducto);
        $cantidadComprar = isset($cantidades[$idProducto]) ? intval($cantidades[$idProducto]) : 1;

        if ($cantidadComprar < 1) $cantidadComprar = 1;

        $query = "SELECT cantidad, producto FROM productos WHERE id = $idProducto FOR UPDATE";
        $resultado = mysqli_query($conn, $query);
        $prod = mysqli_fetch_assoc($resultado);

        if (!$prod) {
            throw new Exception("Producto no encontrado (ID: $idProducto)");
        }

        if ($cantidadComprar > $prod['cantidad']) {
            throw new Exception("No hay suficiente stock para: {$prod['producto']}");
        }
    }

    // 2) RESTAR STOCK
    foreach ($productos as $idProducto) {

        $idProducto = intval($idProducto);
        $cantidadComprar = isset($cantidades[$idProducto]) ? intval($cantidades[$idProducto]) : 1;
        if ($cantidadComprar < 1) $cantidadComprar = 1;

        $update = "UPDATE productos 
                   SET cantidad = cantidad - $cantidadComprar 
                   WHERE id = $idProducto";

        if (!mysqli_query($conn, $update)) {
            throw new Exception("Error al actualizar stock (ID: $idProducto)");
        }
    }

    // --- CONFIRMAR TRANSACCIÓN ---
    mysqli_commit($conn);

} catch (Exception $e) {

    // si algo falla, se devuelve todo
    mysqli_rollback($conn);

    echo "<script>
            alert('Error: " . $e->getMessage() . "');
            window.location.href='inventario.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra confirmada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5">
    <h1 class="mb-4">Compra realizada con éxito 🎉</h1>

    <h4>Resumen:</h4>

    <ul class="mt-3">
        <?php
        $total = 0;

        foreach ($productos as $idProducto) {
            $idProducto = intval($idProducto);
            $cantidadComprar = isset($cantidades[$idProducto]) ? intval($cantidades[$idProducto]) : 1;
            if ($cantidadComprar < 1) $cantidadComprar = 1;

            $query = "SELECT producto, precio FROM productos WHERE id = $idProducto";
            $resultado = mysqli_query($conn, $query);
            $prod = mysqli_fetch_assoc($resultado);

            if (!$prod) continue;

            $subtotal = $prod['precio'] * $cantidadComprar;
            $total += $subtotal;

            echo "<li>
                    <b>{$prod['producto']}</b> - Cantidad: <b>$cantidadComprar</b> - 
                    Subtotal: $" . number_format($subtotal, 0) . "
                  </li>";
        }
        ?>
    </ul>

    <div class="alert alert-warning fw-bold mt-4">
        Total: $<?= number_format($total, 0); ?>
    </div>

    <a href="inventario.php" class="btn btn-warning mt-3">Volver al inventario</a>
</div>

</body>
</html>
