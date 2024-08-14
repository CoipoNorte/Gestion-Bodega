<?php
include('../helpers/sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?></h4>
            </div>
            <div>
                <a href="principalAdmin.php" class="btn btn-secondary"><img src="../img/home.png" alt="Home" width="20"> Home</a>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">Registrar Personal</h1>

        <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">Error: ';
            if ($_GET['error'] == 'campos_vacios') {
                echo 'Todos los campos son obligatorios.';
            } elseif ($_GET['error'] == 'contraseñas_no_coinciden') {
                echo 'Las contraseñas no coinciden.';
            }
            echo '</div>';
        }
        if (isset($_GET['valida'])) {
            if ($_GET['valida'] == 'usuario_creado') {
                echo '<div class="alert alert-success">Usuario creado exitosamente.</div>';
            }
        }
        ?>

        <form action="../controllers/crear_personal_process.php" method="post">
            <div class="mb-3">
                <label for="rut" class="form-label">RUT:</label>
                <input type="text" id="rut" name="rut" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cargo" class="form-label">Cargo:</label>
                <select id="cargo" name="cargo" class="form-select" required>
                    <option value="" disabled selected>Seleccione un cargo</option>
                    <option value="Admin">Admin</option>
                    <option value="Bodega">Bodega</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="contrasena1" class="form-label">Contraseña:</label>
                <input type="password" id="contrasena1" name="contrasena1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contrasena2" class="form-label">Confirmar Contraseña:</label>
                <input type="password" id="contrasena2" name="contrasena2" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
        