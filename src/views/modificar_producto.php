<?php
include('../helpers/sesion.php');
include('../config/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo htmlspecialchars($_SESSION['nombre'] . ' ' . $_SESSION['apellido']); ?></h4>
            </div>
            <div>
                <?php
                if ($_SESSION['cargo'] == 'Admin') {
                    echo "<a href='principalAdmin.php' class='btn btn-secondary'><img src='../img/home.png' alt='Home' width='20'> Home</a>";
                } else {
                    echo "<a href='principalBodega.php' class='btn btn-secondary'><img src='../img/home.png' alt='Home' width='20'> Home</a>";
                }
                ?>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">PRODUCTOS EXISTENTES</h1>

        <?php
        // Mostrar productos existentes
        $consulta = "SELECT * FROM PRODUCTOS";
        $query = $conn->prepare($consulta);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th>Código Producto</th>";
        echo "<th>Descripción</th>";
        echo "<th>Stock</th>";
        echo "<th>Proveedor</th>";
        echo "<th>Fecha de Ingreso</th>";
        echo "</tr></thead><tbody>";

        foreach ($results as $result) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($result['cod_producto']) . "</td>";
            echo "<td>" . htmlspecialchars($result['descripcion']) . "</td>";
            echo "<td>" . htmlspecialchars($result['stock']) . "</td>";
            echo "<td>" . htmlspecialchars($result['proveedor']) . "</td>";
            echo "<td>" . htmlspecialchars($result['fecha_ingreso']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        ?>

        <div class="mb-5">
            <h2 class="text-center">Actualizar Stock</h2>
            <form method="post" action="../controllers/modificar_producto_process.php">
                <div class="mb-3">
                    <label for="codigo_stock" class="form-label">Código del Producto:</label>
                    <input type="text" id="codigo_stock" name="codigo_stock" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="stock_nuevo" class="form-label">Nuevo Stock:</label>
                    <input type="number" id="stock_nuevo" name="stock_nuevo" class="form-control" required>
                </div>
                <button type="submit" name="actualizar_stock" class="btn btn-primary">Actualizar Stock</button>
            </form>

            <div class="mt-4">
                <h2 class="text-center">Modificar Producto</h2>
                <form method="post" action="../controllers/modificar_producto_process.php">
                    <div class="mb-3">
                        <label for="codigo_modificar" class="form-label">Código del Producto:</label>
                        <input type="text" id="codigo_modificar" name="codigo_modificar" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_modificar" class="form-label">Descripción:</label>
                        <input type="text" id="descripcion_modificar" name="descripcion_modificar" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="proveedor_modificar" class="form-label">Proveedor:</label>
                        <input type="text" id="proveedor_modificar" name="proveedor_modificar" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_modificar" class="form-label">Fecha de Ingreso:</label>
                        <input type="date" id="fecha_modificar" name="fecha_modificar" class="form-control" required>
                    </div>
                    <button type="submit" name="modificar_producto" class="btn btn-primary">Modificar Producto</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ll3hJ4f55l39eF0eTT7+GV6ZwQKj06XK7l01D5csd1P2yfs+XZP7oc/yNk13t7+5" crossorigin="anonymous"></script>
</body>
</html>
