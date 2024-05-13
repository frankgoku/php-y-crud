<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión / Registro</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="user_management.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

    <h1>Registrar Usuario</h1>
    <form action="user_management.php" method="post">
        <label for="reg_email">Email:</label><br>
        <input type="email" id="reg_email" name="reg_email" required><br>
        <label for="reg_password">Contraseña:</label><br>
        <input type="password" id="reg_password" name="reg_password" required><br>
        <input type="submit" value="Registrar">
    </form>

    <!-- Agregar mensaje de éxito después del inicio de sesión -->
    <?php if (isset($_GET['login']) && $_GET['login'] === 'success'): ?>
        <p>Inicio de sesión exitoso. ¡Bienvenido!</p>
    <?php endif; ?>

    <!-- Agregar mensaje de éxito después del registro -->
    <?php if (isset($_GET['registration']) && $_GET['registration'] === 'success'): ?>
        <p>Registro exitoso. Tu cuenta ha sido creada.</p>
    <?php endif; ?>
</body>
</html>
