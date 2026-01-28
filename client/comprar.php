<?php
require('../conexion.php');

if (!isset($_POST['productos']) || count($_POST['productos']) == 0) {
    echo "<h3>No seleccionaste ningún producto.</h3>";
    echo "<a href='inventario.php'>Volver</a>";
    exit;
}

$productosSeleccionados = $_POST['productos'];

// Limpiar datos (seguridad)
$ids = array_map('intval', $productosSeleccionados);
$idsString = implode(",", $ids);

// Consultar productos seleccionados
$query = "SELECT * FROM productos WHERE id IN ($idsString)";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5">
    <h2>Productos seleccionados</h2>

    <form action="confirmar_compra.php" method="POST">
        <table class="table table-dark table-bordered mt-4">
            <thead class="table-light">
                <tr align="center">
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Cantidad a llevar</th>
                    <th>Precio por unidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
            <?php while($extraido = mysqli_fetch_assoc($resultado)) { ?>
                <tr align="center">
                    <td><?= $extraido['producto'] ?></td>
                    <td><?= $extraido['marca'] ?></td>

                    <!-- IMPORTANTE: guardamos precio en data-precio -->
                    <td>
                        <input 
                            class="form-control text-center cantidad-input"
                            type="number"
                            name="cantidad[<?= $extraido['id'] ?>]"
                            value="1"
                            min="1"
                            max="<?= $extraido['cantidad'] ?>"
                            data-precio="<?= $extraido['precio'] ?>"
                        >
                    </td>

                    <td>$<?= number_format($extraido['precio'], 0) ?></td>

                    <!-- Subtotal -->
                    <td class="subtotal">
                        $<?= number_format($extraido['precio'], 0) ?>
                    </td>

                    <!-- Mandar ids a confirmar_compra.php -->
                    <input type="hidden" name="productos[]" value="<?= $extraido['id'] ?>">
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <!-- Total -->
        <div class="alert alert-warning fw-bold" role="alert">
            Total: <span id="total">$0</span>
        </div>

        <div class="d-flex gap-2">
            <a href="inventario.php" class="btn btn-warning">Volver</a>
            <button type="submit" class="btn btn-success">Confirmar compra</button>
        </div>
    </form>
</div>

<script>
function formatearCOP(valor) {
    return "$" + valor.toLocaleString("es-CO");
}

function recalcularTotal() {
    let total = 0;

    document.querySelectorAll(".cantidad-input").forEach(input => {
        const cantidad = parseInt(input.value) || 0;
        const precio = parseFloat(input.dataset.precio) || 0;

        const subtotal = cantidad * precio;
        total += subtotal;

        // actualizar subtotal de esa fila
        const fila = input.closest("tr");
        fila.querySelector(".subtotal").innerText = formatearCOP(subtotal);
    });

    document.getElementById("total").innerText = formatearCOP(total);
}

// recalcular al cargar
recalcularTotal();

// recalcular cuando cambie cualquier cantidad
document.querySelectorAll(".cantidad-input").forEach(input => {
    input.addEventListener("input", recalcularTotal);
});
</script>

</body>
</html>