<?php
require('../conexion.php');

$buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '';

if ($buscar != '') {
    function resaltar_frase($string, $frase, $taga = '<b>', $tagb = '</b>') {
        return preg_replace('/(' . preg_quote($frase, '/') . ')/i', $taga . '\\1' . $tagb, $string);
    }

    $akeyword = explode(" ", $buscar);
    $filtro = "WHERE producto LIKE LOWER('%".$akeyword[0]."%') OR marca LIKE LOWER('%".$akeyword[0]."%')";

    for ($i = 1; $i < count($akeyword); $i++) {
        $filtro .= " OR producto LIKE LOWER('%".$akeyword[$i]."%') OR marca LIKE LOWER('%".$akeyword[$i]."%')";
    }

    $query = "SELECT * FROM productos $filtro ORDER BY id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table table-dark table-hover table-bordered'>
                <thead class='table-light'>
                    <tr align='center'>
                        <th scope='col'><i class='fa-solid fa-cart-shopping'></i></th>  
                        <th scope='col'>Id</th>
                        <th scope='col'>Producto</th>
                        <th scope='col'>Marca</th>
                        <th scope='col'>Cantidad</th>
                        <th scope='col'>Precio</th>
                    </tr>
                </thead>";

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr align='center'>";
            ?>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                    </div>
                </td>
            <?php
            echo "<td>" . resaltar_frase($fila['id'], $buscar) . "</td>";
            echo "<td>" . resaltar_frase($fila['producto'], $buscar) . "</td>";
            echo "<td>" . resaltar_frase($fila['marca'], $buscar) . "</td>";
            echo "<td>" . $fila['cantidad'] . "</td>";
            echo "<td>" . $fila['precio'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        ?>
         <div class="alert alert-warning" role="alert">
            no se encontraron resultados
        </div>
        <?php
    }
}
?>
