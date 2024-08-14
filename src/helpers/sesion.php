<?php
session_start();

// Verificar si la sesión está activa
if (!isset($_SESSION["activo"]) || !$_SESSION["activo"]) {
    // Redirigir a la página de salida si la sesión no está activa
    header("Location: ../helpers/salir.php?sal=si");
    exit(); // Asegurarse de que no se ejecute más código después de la redirección
}
?>
