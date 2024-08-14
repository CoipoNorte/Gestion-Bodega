<?php
include('../helpers/sesion.php');
include('../config/conexion.php');

// Obtener mensajes si existen
$message = isset($_GET['message']) ? $_GET['message'] : '';
$alertClass = isset($_GET['alertClass']) ? $_GET['alertClass'] : '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h4>
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

        <?php if ($message): ?>
            <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <h1 class="text-center mb-4">Eliminar Producto</h1>

        <?php
        $consulta = "SELECT * FROM PRODUCTOS";
        $query = $conn->prepare($consulta);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table table-striped table-bordered mb-4">
            <thead>
                <tr>
                    <th scope="col">Código Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Fecha de Ingreso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['cod_producto']); ?></td>
                        <td><?php echo htmlspecialchars($result['descripcion']); ?></td>
                        <td><?php echo htmlspecialchars($result['stock']); ?></td>
                        <td><?php echo htmlspecialchars($result['proveedor']); ?></td>
                        <td><?php echo htmlspecialchars($result['fecha_ingreso']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form action="../controllers/eliminar_producto_process.php" method="post" class="mb-4">
            <div class="mb-3">
                <label for="eliminar-producto" class="form-label">Ingresa el código del producto a eliminar:</label>
                <input type="text" name="eliminar-producto" id="eliminar-producto" class="form-control" required>
            </div>
            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ll3hJ4f55l39eF0eTT7+GV6ZwQKj06XK7l01D5csd1P2yfs+XZP7oc/yNk13t7+5" crossorigin="anonymous"></script>
</body>

</html>
