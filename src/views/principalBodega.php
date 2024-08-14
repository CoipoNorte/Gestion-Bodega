<?php
include('../helpers/sesion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bodega</title>
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

        <h1 class="text-center mb-4">CUENTA DE BODEGA</h1>

        <h2 class="text-center mb-4">CONTROL DE PRODUCTOS</h2>

        <div class="row text-center">
            <div class="col-md-4 mb-3">
                <a href="agregar_productos.php" class="btn btn-product d-block">
                    <img src="../img/adp.png" class="img-fluid" alt="Agregar Producto">
                    <h4>Agregar Producto</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="modificar_producto.php" class="btn btn-product d-block">
                    <img src="../img/modp.png" class="img-fluid" alt="Modificar Producto">
                    <h4>Modificar Producto</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="eliminar_producto.php" class="btn btn-product d-block">
                    <img src="../img/elp.png" class="img-fluid" alt="Eliminar Producto">
                    <h4>Eliminar Producto</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="realizar_entrega.php" class="btn btn-action d-block">
                    <img src="../img/entrega.png" class="img-fluid" alt="Entrega de Productos">
                    <h4>Entrega de Productos</h4>
                </a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="entregas.php" class="btn btn-action d-block">
                    <img src="../img/entregado.png" class="img-fluid" alt="Entregas Realizadas">
                    <h4>Entregas Realizadas</h4>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
