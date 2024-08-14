<?php
include('../config/conexion.php');

if (isset($_POST['agregar'])) {
    $rut = $_POST['rut'];
    $codigo = $_POST['codigo'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha'];

    // Check if fields are not empty
    if (empty($rut) || empty($codigo) || empty($cantidad) || empty($fecha)) {
        header("Location: ../views/realizar_entrega.php?message=Todos+los+campos+son+obligatorios.&type=error");
        exit();
    }

    try {
        // Check if rut exists in personal table
        $consulta_rut = "SELECT rut FROM personal WHERE rut = :rut";
        $query_rut = $conn->prepare($consulta_rut);
        $query_rut->bindParam(':rut', $rut);
        $query_rut->execute();

        if ($query_rut->rowCount() > 0) {
            // Check if product exists and has sufficient stock
            $consulta_stock = "SELECT stock FROM PRODUCTOS WHERE cod_producto = :codigo";
            $query_stock = $conn->prepare($consulta_stock);
            $query_stock->bindParam(':codigo', $codigo);
            $query_stock->execute();
            $result_stock = $query_stock->fetch(PDO::FETCH_ASSOC);

            if ($result_stock) {
                $stock_actual = $result_stock['stock'];

                if ($cantidad > $stock_actual) {
                    header("Location: ../views/realizar_entrega.php?message=No+hay+suficiente+stock+para+realizar+la+entrega.&type=error");
                    exit();
                } else {
                    // Update stock
                    $nuevo_stock = $stock_actual - $cantidad;
                    $consulta_update = "UPDATE PRODUCTOS SET stock = :nuevo_stock WHERE cod_producto = :codigo";
                    $query_update = $conn->prepare($consulta_update);
                    $query_update->bindParam(':nuevo_stock', $nuevo_stock);
                    $query_update->bindParam(':codigo', $codigo);
                    $query_update->execute();

                    // Insert into entregas table
                    $consulta_insert = "INSERT INTO entregas (rut, cod_producto, cantidad, fecha_entrega) VALUES (:rut, :codigo, :cantidad, :fecha)";
                    $query_insert = $conn->prepare($consulta_insert);
                    $query_insert->bindParam(':rut', $rut);
                    $query_insert->bindParam(':codigo', $codigo);
                    $query_insert->bindParam(':cantidad', $cantidad);
                    $query_insert->bindParam(':fecha', $fecha);
                    $query_insert->execute();

                    header("Location: ../views/realizar_entrega.php?message=Entrega+registrada+correctamente.&type=success");
                    exit();
                }
            } else {
                header("Location: ../views/realizar_entrega.php?message=Código+de+producto+no+encontrado.&type=error");
                exit();
            }
        } else {
            header("Location: ../views/realizar_entrega.php?message=Rut+personal+no+encontrado.&type=error");
            exit();
        }
    } catch (PDOException $e) {
        header("Location: ../views/realizar_entrega.php?message=Error:+".$e->getMessage()."&type=error");
        exit();
    }
} else {
    header("Location: ../views/realizar_entrega.php?message=Acción+no+permitida.&type=error");
    exit();
}
?>
