<?php
include('../helpers/sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h4>
            </div>
            <div>
                <a href="principalAdmin.php" class="btn btn-secondary"><img src="../img/home.png" alt="Home" width="20"> Home</a>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">Registros Existentes</h1>

        <?php
        include('../config/conexion.php');

        $consulta = "SELECT * FROM PERSONAL";
        $query = $conn->prepare($consulta);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="table-responsive mb-4">';
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr>';
        echo '<th>RUT</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '<th>Cargo</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        if ($query->rowCount() > 0) {
            foreach ($results as $result) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($result['rut']) . '</td>';
                echo '<td>' . htmlspecialchars($result['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($result['apellido']) . '</td>';
                echo '<td>' . htmlspecialchars($result['cargo']) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4" class="text-center">No hay personal registrado.</td></tr>';
        }

        echo '</tbody></table></div>';

        // Mostrar mensaje de error o éxito
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">Error: ' . htmlspecialchars($_GET['error']) . '</div>';
        }
        if (isset($_GET['success'])) {
            echo '<div class="alert alert-success">Éxito: ' . htmlspecialchars($_GET['success']) . '</div>';
        }
        ?>

        <div class="mt-4">
            <h2>Modificar Personal</h2>
            <form action="../controllers/modificar_personal_process.php" method="post">
                <div class="mb-3">
                    <label for="seleccionar" class="form-label">Ingresa el RUT del registro a modificar:</label>
                    <input id="seleccionar" name="seleccionar" type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input id="nombre" name="nombre" type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input id="apellido" name="apellido" type="text" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <select id="cargo" name="cargo" class="form-select" required>
                        <option value="" disabled selected>Selecciona el cargo</option>
                        <option value="Admin">Admin</option>
                        <option value="Bodega">Bodega</option>
                    </select>
                </div>

                <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
