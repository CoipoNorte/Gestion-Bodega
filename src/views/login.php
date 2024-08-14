<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">          
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <!-- Mensaje -->
                <?php
                error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); 
                if (isset($_GET["error"]) && $_GET["error"] == "si") { 
                    echo "<div class='alert alert-danger text-center' role='alert'>VERIFICA TUS DATOS</div>";
                }
                ?>
                <!-- Titulo -->
                <h2 class="text-center mb-4">Gestor de Bodega</h2>
                <h5 class="text-center mb-4">Por favor ingresa tus datos</h5>
                <h5 class="text-center mb-4">Admin: 20.248.430-1 - 20248</h5>
                <h5 class="text-center mb-4">Bodega: 19.976.780-1 - 19976</h5>
                
                <!-- Formulario Login -->
                <form name="login" method="post" action="../controllers/validar.php">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingresa tu usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="ingresar" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
