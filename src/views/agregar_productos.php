<?php
include('../helpers/sesion.php');
include('../config/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Productos</title>
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
                <?php
                if ($_SESSION['cargo'] == 'Admin') {
                    echo '<a href="principalAdmin.php" class="btn btn-secondary"><img src="../img/home.png" alt="Home" width="20"> Home</a>';
                } else {
                    echo '<a href="principalBodega.php" class="btn btn-secondary"><img src="../img/home.png" alt="Home" width="20"> Home</a>';
                }
                ?>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">Gestión de Productos</h1>

        <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">Error: ';
            if ($_GET['error'] == 'campos_vacios') {
                echo 'Todos los campos son obligatorios.';
            } elseif ($_GET['error'] == 'producto_existe') {
                echo 'Ya existe un producto con el mismo código.';
            } else {
                echo 'Error desconocido.';
            }
            echo '</div>';
        }
        if (isset($_GET['success'])) {
            if ($_GET['success'] == 'producto_agregado') {
                echo '<div class="alert alert-success">Producto añadido correctamente.</div>';
            }
        }
        ?>

        <form action="../controllers/agregar_producto_process.php" method="post">
            <div class="mb-3">
                <label for="codigo" class="form-label">Código del producto:</label>
                <input type="text" id="codigo" name="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="proveedor" class="form-label">Proveedor:</label>
                <input type="text" id="proveedor" name="proveedor" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha ingreso:</label>
                <input type="date" id="fecha" name="fecha" class="form-control" required>
            </div>

            <button type="submit" name="crear" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
