<?php
// Ruta completa al archivo de la base de datos SQLite
$db_file = 'C:/sqlite/users.db';

try {
    // Conexión a la base de datos SQLite
    $db = new PDO('sqlite:' . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener todos los elementos del inventario
    $stmt = $db->query("SELECT * FROM Inventory");
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los datos del inventario en formato JSON
    header('Content-Type: application/json');
    echo json_encode($inventory);
} catch (PDOException $e) {
    // Manejo de errores
    die("Error al obtener el inventario: " . $e->getMessage());
}
?>
