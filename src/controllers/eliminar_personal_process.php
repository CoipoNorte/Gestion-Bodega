<?php
include('../config/conexion.php');  

if (isset($_POST['eliminar'])) {
    $rut = $_POST['eliminar-personal'];

    // Validar que el RUT no sea el admin general
    if ($rut == '20.248.430-1') {
        header('Location: ../views/eliminar_personal.php?error=El%20admin%20general%20no%20puede%20ser%20eliminado');
        exit();
    }

    // Intentar eliminar el registro
    try {
        $consulta = "DELETE FROM PERSONAL WHERE rut = :rut";
        $query = $conn->prepare($consulta);
        $query->bindParam(':rut', $rut);
        $query->execute();

        // Verificar si la eliminación fue exitosa
        if ($query->rowCount() > 0) {
            header('Location: ../views/eliminar_personal.php?success=El%20personal%20ha%20sido%20eliminado%20correctamente');
        } else {
            header('Location: ../views/eliminar_personal.php?error=No%20se%20encontró%20ningún%20registro%20con%20ese%20RUT');
        }
    } catch (PDOException $e) {
        header('Location: ../views/eliminar_personal.php?error=' . urlencode($e->getMessage()));
    }
}
?>
