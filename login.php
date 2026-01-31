<?php
session_start();
require_once "conexion.php";

// Si ya está logueado, redirigir directamente
if (isset($_SESSION['id'])) {
    if ($_SESSION['id_cargo'] == 1) {
        header("Location: admin/inventario.php");
        exit;
    } else {
        header("Location: client/inventario.php");
        exit;
    }
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contraseña'] ?? '';

    $usuario = trim($usuario);
    $contrasena = trim($contrasena);

    // Buscar usuario en BD
    $stmt = $conn->prepare("SELECT id, nombre, correo, usuario, contraseña, id_cargo FROM usuarios WHERE usuario = ? LIMIT 1");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $datos = $result->fetch_assoc();

        // Comparación directa (si tu BD guarda contraseña en texto plano)
        if ($datos['contraseña'] === $contrasena) {

            // Guardar sesión
            $_SESSION['id'] = $datos['id'];
            $_SESSION['nombre'] = $datos['nombre'];
            $_SESSION['correo'] = $datos['correo'];
            $_SESSION['usuario'] = $datos['usuario'];
            $_SESSION['id_cargo'] = $datos['id_cargo'];

            // Redirección según cargo
            if ($datos['id_cargo'] == 1) {
                header("Location: admin/inventario.php");
                exit;
            } else {
                header("Location: client/inventario.php");
                exit;
            }

        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include "barra-navegacion.php"; ?>

<div class="container mt-5" style="max-width: 450px;">
    <div class="card bg-dark text-white p-4">
        <h3 class="text-center mb-3">Iniciar sesión</h3>

        <?php if ($error != "") { ?>
            <div class="alert alert-danger text-center fw-bold">
                <?= $error ?>
            </div>
        <?php } ?>

        <form action="login.php" method="POST">
            <div class="mb-3">
                <input required type="text" name="usuario" class="form-control" placeholder="Usuario">
            </div>

            <div class="mb-3">
                <input required type="password" name="contraseña" class="form-control" placeholder="Contraseña">
            </div>

            <button type="submit" class="btn btn-warning w-100 fw-bold">
                Iniciar sesión
            </button>
        </form>

        <div class="mt-3 text-center">
            <p class="text-white">
                ¿Aún no tienes cuenta? <a href="registrar.php">Registrarme</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
