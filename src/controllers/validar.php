<?php
// Incluir el archivo de conexión
include('../config/conexion.php');

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Preparar la consulta SQL para verificar el usuario
$consulta = "SELECT * FROM personal WHERE rut = :usuario";

// Preparar y ejecutar la consulta
$query = $conn->prepare($consulta);
$query->bindParam(':usuario', $usuario);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

// Verificar la contraseña
if ($result && password_verify($pass, $result['contraseña'])) {
    session_start();
    $_SESSION['activo'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['cargo'] = $result['cargo'];
    $_SESSION['nombre'] = $result['nombre'];
    $_SESSION['apellido'] = $result['apellido'];

    // Redirigir según el cargo del usuario
    if ($result['cargo'] == 'Admin') {
        header("Location: ../views/principalAdmin.php");
    } else if ($result['cargo'] == 'Bodega') {
        header("Location: ../views/principalBodega.php");
    }
} else {
    header("Location: ../views/login.php?error=si");
}
?>
