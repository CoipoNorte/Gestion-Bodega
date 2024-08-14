<?php
include('../helpers/sesion.php');
include('../config/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entregas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 20px;
        }
        .form-label {
            font-weight: bold;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?></h4>
            </div>
            <div>
                <a href="principalBodega.php" class="btn btn-secondary"><img src="../img/home.png" alt="Home" width="20"> Home</a>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">Productos Existentes</h1>

        <?php
        // Fetch products
        $consulta = "SELECT * FROM PRODUCTOS";
        $query = $conn->prepare($consulta);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Código Producto</th>";
        echo "<th>Descripción</th>";
        echo "<th>Stock</th>";
        echo "<th>Proveedor</th>";
        echo "<th>Fecha Ingreso</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>{$result['cod_producto']}</td>";
            echo "<td>{$result['descripcion']}</td>";
            echo "<td>{$result['stock']}</td>";
            echo "<td>{$result['proveedor']}</td>";
            echo "<td>{$result['fecha_ingreso']}</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        ?>

        <form action="../controllers/realizar_entrega_process.php" method="post">
            <div class="mb-3">
                <label for="rut" class="form-label">Rut personal que retira:</label>
                <input type="text" id="rut" name="rut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código del producto:</label>
                <input type="text" id="codigo" name="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha entrega:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>

            <button type="submit" name="agregar" class="btn btn-primary">Agregar Entrega</button>
        </form>

        <?php
        if (isset($_GET['message'])) {
            $message = htmlspecialchars($_GET['message']);
            $alertType = $_GET['type'] === 'error' ? 'alert-danger' : 'alert-success';
            echo "<div class='alert $alertType mt-3'>$message</div>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
