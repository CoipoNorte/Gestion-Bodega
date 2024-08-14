<?php
include('../helpers/sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn-product {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-product:hover {
            background-color: #0056b3;
        }

        .btn-action {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
        }

        .btn-action:hover {
            background-color: #218838;
        }

        .btn img {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4>Bienvenido/a, <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h4>
            </div>
            <div>
                <a href="../helpers/salir.php?sal=si" class="btn btn-danger"><img src="../img/cerrar.png" alt="Salir" width="20"> Salir</a>
            </div>
        </div>

        <h1 class="text-center mb-4">Panel de Administración</h1>

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="agregar_productos.php" class="btn btn-product d-block text-center">
                    <img src="../img/adp.png" class="img-fluid mb-2" alt="Agregar Producto">
                    <h4>Agregar Producto</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="modificar_producto.php" class="btn btn-product d-block text-center">
                    <img src="../img/modp.png" class="img-fluid mb-2" alt="Modificar Producto">
                    <h4>Modificar Producto</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="eliminar_producto.php" class="btn btn-product d-block text-center">
                    <img src="../img/elp.png" class="img-fluid mb-2" alt="Eliminar Producto">
                    <h4>Eliminar Producto</h4>
                </a>
            </div>
        </div>

        <h2 class="text-center mt-4">Control de Personal</h2>

        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="crear_personal.php" class="btn btn-action d-block text-center">
                    <img src="../img/ad.png" class="img-fluid mb-2" alt="Registrar Personal">
                    <h4>Registrar Personal</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="modificar_personal.php" class="btn btn-action d-block text-center">
                    <img src="../img/mod.png" class="img-fluid mb-2" alt="Modificar Personal">
                    <h4>Modificar Personal</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="eliminar_personal.php" class="btn btn-action d-block text-center">
                    <img src="../img/el.png" class="img-fluid mb-2" alt="Eliminar Personal">
                    <h4>Eliminar Personal</h4>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
