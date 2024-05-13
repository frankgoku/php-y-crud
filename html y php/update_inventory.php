<?php
// Conexión a la base de datos SQLite
$db_file = 'C:/sqlite/users.db';
try {
    $db = new PDO('sqlite:' . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Obtener los datos del formulario
$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Actualizar el elemento del inventario
$stmt = $db->prepare("UPDATE Inventory SET item_name = ?, quantity = ?, price = ? WHERE item_id = ?");
$result = $stmt->execute([$item_name, $quantity, $price, $item_id]);

if ($result) {
    echo "El artículo se actualizó correctamente.";
} else {
    echo "Error al actualizar el artículo.";
}
?>
