<?php
include('../config/conexion.php');

try {
    $consulta = "SELECT * FROM entregas";
    $query = $conn->prepare($consulta);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if ($query->rowCount() > 0) {
        echo "<table class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>CÓDIGO DEL PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>FECHA DE ENTREGA</th>
                </tr>
            </thead>
            <tbody>";

        foreach($results as $result) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($result['rut']) . "</td>";
            echo "<td>" . htmlspecialchars($result['cod_producto']) . "</td>";
            echo "<td>" . htmlspecialchars($result['cantidad']) . "</td>";
            echo "<td>" . htmlspecialchars($result['fecha_entrega']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='text-center'>No se han realizado entregas.</p>";
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
