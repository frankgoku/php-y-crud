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
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Insertar un nuevo elemento en el inventario
$stmt = $db->prepare("INSERT INTO Inventory (item_name, quantity, price) VALUES (?, ?, ?)");
$result = $stmt->execute([$item_name, $quantity, $price]);

if ($result) {
    echo "El artículo se agregó correctamente.";
} else {
    echo "Error al agregar el artículo.";
}
?>
