<?php
include('../helpers/sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Personal</title>
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

        <h1 class="text-center mb-4">Eliminar Personal</h1>

        <?php
        include('../config/conexion.php');

        // Mostrar los registros actuales
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

        <form action="../controllers/eliminar_personal_process.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="eliminar-personal" class="form-label">Ingresa el RUT del personal a eliminar:</label>
                <input id="eliminar-personal" name="eliminar-personal" type="text" class="form-control" required>
            </div>
            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
