<?php
include('../helpers/sesion.php');
include('../config/conexion.php');

$message = '';
$alertClass = '';

if (isset($_POST['eliminar'])) {
    $eliminar = $_POST['eliminar-producto'];

    // Consulta para verificar si el producto existe
    $consulta = "SELECT * FROM PRODUCTOS WHERE cod_producto = :codigo";
    $query = $conn->prepare($consulta);
    $query->bindParam(':codigo', $eliminar);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Producto existe, proceder a eliminarlo
        $consulta = "DELETE FROM PRODUCTOS WHERE cod_producto = :codigo";
        $query = $conn->prepare($consulta);
        $query->bindParam(':codigo', $eliminar);
        $query->execute();

        if ($query->rowCount() > 0) {
            $message = 'Producto eliminado correctamente.';
            $alertClass = 'alert-success';
        } else {
            $message = 'No se pudo eliminar el producto.';
            $alertClass = 'alert-danger';
        }
    } else {
        $message = 'Producto no encontrado.';
        $alertClass = 'alert-danger';
    }
}

// Redirigir de vuelta a eliminar_producto.php con el mensaje de resultado
header("Location: ../views/eliminar_producto.php?message=$message&alertClass=$alertClass");
exit();
?>
