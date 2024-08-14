<?php
include('../config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $stock = $_POST['stock'] ?? null;
    $proveedor = $_POST['proveedor'] ?? null;
    $fecha = $_POST['fecha'] ?? null;

    // Validar que los datos no estén vacíos
    if (empty($codigo) || empty($descripcion) || empty($stock) || empty($proveedor) || empty($fecha)) {
        header("Location: ../views/agregar_productos.php?error=campos_vacios");
        exit();
    }

    // Verificar si el producto ya existe
    $consulta = "SELECT * FROM PRODUCTOS WHERE cod_producto = :codigo";
    $query = $conn->prepare($consulta);
    $query->bindParam(':codigo', $codigo);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        header("Location: ../views/agregar_productos.php?error=producto_existe");
    } else {
        // Insertar nuevo producto
        $consulta = "INSERT INTO PRODUCTOS (cod_producto, descripcion, stock, proveedor, fecha_ingreso) 
                     VALUES (:codigo, :descripcion, :stock, :proveedor, :fecha)";
        $query = $conn->prepare($consulta);
        $query->bindParam(':codigo', $codigo);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':stock', $stock);
        $query->bindParam(':proveedor', $proveedor);
        $query->bindParam(':fecha', $fecha);

        try {
            $query->execute();
            header("Location: ../views/agregar_productos.php?success=producto_agregado");
        } catch (PDOException $e) {
            header("Location: ../views/agregar_productos.php?error=" . urlencode('Error al agregar el producto: ' . $e->getMessage()));
        }
    }
} else {
    header("Location: ../views/agregar_productos.php");
}
?>
