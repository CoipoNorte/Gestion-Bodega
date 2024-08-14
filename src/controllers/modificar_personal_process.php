<?php
include('../config/conexion.php');

if (isset($_POST['modificar'])) {
    $rut = $_POST['seleccionar'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];

    // Validar que el RUT no sea el admin general
    if ($rut == '20.248.430-1') {
        header('Location: ../views/modificar_personal.php?error=El%20admin%20general%20no%20puede%20ser%20modificado');
        exit();
    }

    // Intentar modificar el registro
    try {
        $consulta = "UPDATE PERSONAL SET nombre = :nombre, apellido = :apellido, cargo = :cargo WHERE rut = :rut";
        $query = $conn->prepare($consulta);
        $query->bindParam(':rut', $rut);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellido', $apellido);
        $query->bindParam(':cargo', $cargo);
        $query->execute();

        // Verificar si la actualización fue exitosa
        if ($query->rowCount() > 0) {
            header('Location: ../views/modificar_personal.php?success=El%20registro%20ha%20sido%20modificado%20correctamente');
        } else {
            header('Location: ../views/modificar_personal.php?error=No%20se%20encontró%20ningún%20registro%20con%20ese%20RUT');
        }
    } catch (PDOException $e) {
        header('Location: ../views/modificar_personal.php?error=' . urlencode($e->getMessage()));
    }
}
?>
