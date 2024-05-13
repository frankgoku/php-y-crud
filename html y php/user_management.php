<?php
// Ruta completa al archivo de la base de datos SQLite
$db_file = 'C:/sqlite/users.db';

// Conexión a la base de datos SQLite
try {
    $db = new PDO('sqlite:' . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}

// Función para verificar si el email ya está registrado
function emailExists($email, $db) {
    $stmt = $db->prepare("SELECT COUNT(*) FROM Users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetchColumn() > 0;
}

// Manejar el inicio de sesión
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM Users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        // Redirigir al usuario a la página de inventario
        header("Location: inventario.html");
        exit(); // Finalizar el script después de la redirección
    } else {
        echo "Email o contraseña incorrectos.";
    }
}

// Manejar el registro de usuario
if (isset($_POST['reg_email']) && isset($_POST['reg_password'])) {
    $reg_email = $_POST['reg_email'];
    $reg_password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

    if (emailExists($reg_email, $db)) {
        echo "Este email ya está registrado. Por favor, utiliza otro.";
    } else {
        $stmt = $db->prepare("INSERT INTO Users (email, password_hash) VALUES (?, ?)");
        if ($stmt->execute([$reg_email, $reg_password])) {
            // Redirigir al usuario a la página de registro exitoso
            header("Location: registration_success.php");
            exit(); // Finalizar el script después de la redirección
        } else {
            echo "Error al registrar usuario.";
            // Puedes agregar más detalles sobre el error utilizando $stmt->errorInfo()
        }
    }
}
?>
