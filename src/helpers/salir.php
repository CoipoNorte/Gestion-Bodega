<?php 

// Verifica que la variable 'sal' en la URL sea igual a 'si'
if (isset($_GET['sal']) && $_GET['sal'] == 'si') {

    // Inicia la sesión
    session_start();

    // Destruye la sesión para cerrar la sesión actual
    session_destroy();

    // Redirige al usuario a la página de inicio de sesión
    header("Location: ../views/login.php");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>
