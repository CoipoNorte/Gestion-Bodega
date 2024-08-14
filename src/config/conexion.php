<?php
// Conexión a la base de datos
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'db_gestion_bodega';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8mb4", $username, $password);
    // Configurar PDO para lanzar excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Registrar el error en un archivo de logs y mostrar un mensaje genérico al usuario
    error_log('Connection failed: ' . $e->getMessage(), 0);  // Registrar en el log de errores de PHP
    die('Connection failed: Please contact support.');
}
?>