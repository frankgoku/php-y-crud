<?php
// Conexión a la base de datos SQLite
$db_file = 'C:/sqlite/users.db';
try {
    $db = new PDO('sqlite:' . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Obtener el ID del artículo a eliminar
$item_id = $_POST['item_id'];

// Eliminar el elemento del inventario
$stmt = $db->prepare("DELETE FROM Inventory WHERE item_id = ?");
$result = $stmt->execute([$item_id]);

if ($result) {
    echo "El artículo se eliminó correctamente.";
} else {
    echo "Error al eliminar el artículo.";
}
?>
