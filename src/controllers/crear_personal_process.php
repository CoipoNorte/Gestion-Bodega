<?php
include('../config/conexion.php');

// Verificar que se enviaron datos a través del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $usuario = $_POST['rut'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $apellido = $_POST['apellido'] ?? null;
    $cargo = $_POST['cargo'] ?? null;
    $pass1 = $_POST['contrasena1'] ?? null;
    $pass2 = $_POST['contrasena2'] ?? null;

    // Validar que los datos no están vacíos
    if (empty($usuario) || empty($nombre) || empty($apellido) || empty($cargo) || empty($pass1) || empty($pass2)) {
        header("Location: ../views/crear_personal.php?error=campos_vacios");
        exit();
    }

    // Validar que las contraseñas coinciden
    if ($pass1 !== $pass2) {
        header("Location: ../views/crear_personal.php?error=contraseñas_no_coinciden");
        exit();
    }

    // Hash de la contraseña
    $pass_hash = password_hash($pass1, PASSWORD_BCRYPT);

    // Preparar la consulta SQL para insertar datos
    $query = $conn->prepare("INSERT INTO personal (rut, nombre, apellido, cargo, contraseña) VALUES (:rut, :nombre, :apellido, :cargo, :pass)");

    // Asociar los parámetros
    $query->bindParam(':rut', $usuario);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellido', $apellido);
    $query->bindParam(':cargo', $cargo);
    $query->bindParam(':pass', $pass_hash);

    // Ejecutar la consulta
    try {
        $query->execute();
        header("Location: ../views/crear_personal.php?valida=usuario_creado");
    } catch (PDOException $e) {
        // Mostrar el error detallado
        header("Location: ../views/crear_personal.php?error=" . urlencode('Error al registrar el usuario: ' . $e->getMessage()));
    }
} else {
    header("Location: ../views/crear_personal.php");
}
?>
