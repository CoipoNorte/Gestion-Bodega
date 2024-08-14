<?php
include('../helpers/sesion.php');
include('../config/conexion.php');

if (isset($_POST['actualizar_stock'])) {
    $codigo_stock = $_POST['codigo_stock'];
    $stock_nuevo = $_POST['stock_nuevo'];

    $consulta = "SELECT * FROM PRODUCTOS WHERE cod_producto = :codigo";
    $query = $conn->prepare($consulta);
    $query->bindParam(':codigo', $codigo_stock);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $stock_antiguo = $result['stock'];
        $stock_total = (int)$stock_nuevo + (int)$stock_antiguo;

        $consulta = "UPDATE PRODUCTOS SET stock = :stock WHERE cod_producto = :codigo";
        $query = $conn->prepare($consulta);
        $query->bindParam(':stock', $stock_total);
        $query->bindParam(':codigo', $codigo_stock);
        $query->execute();

        header('Location: ../views/modificar_producto.php?mensaje=Stock actualizado correctamente');
    } else {
        header('Location: ../views/modificar_producto.php?mensaje=Producto no existe');
    }
}

if (isset($_POST['modificar_producto'])) {
    $codigo_modificar = $_POST['codigo_modificar'];
    $descripcion_modificar = $_POST['descripcion_modificar'];
    $proveedor_modificar = $_POST['proveedor_modificar'];
    $fecha_modificar = $_POST['fecha_modificar'];

    $consulta = "UPDATE PRODUCTOS SET descripcion = :descripcion, proveedor = :proveedor, fecha_ingreso = :fecha WHERE cod_producto = :codigo";
    $query = $conn->prepare($consulta);
    $query->bindParam(':descripcion', $descripcion_modificar);
    $query->bindParam(':proveedor', $proveedor_modificar);
    $query->bindParam(':fecha', $fecha_modificar);
    $query->bindParam(':codigo', $codigo_modificar);
    $query->execute();

    header('Location: ../views/modificar_producto.php?mensaje=Producto modificado correctamente');
}
?>
