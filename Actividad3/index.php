<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $recordar = isset($_POST['recordar']);

    if ($recordar) {
        setcookie("username", $username, time() + 86400 * 30); // 30 días
        setcookie("password", $password, time() + 86400 * 30); // 30 días
    }
    $message = "Usuario recordado con éxito.";
}

if (isset($_POST['delete_cookies'])) {
    setcookie("username", "", time() - 3600);
    setcookie("password", "", time() - 3600);
    $message = "Información de usuario borrada.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Login</title>
</head>
<body>
    <h2>Formulario de Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Usuario" value="<?php echo $_COOKIE['username'] ?? ''; ?>" required>
        <input type="password" name="password" placeholder="Contraseña" value="<?php echo $_COOKIE['password'] ?? ''; ?>" required>
        <label><input type="checkbox" name="recordar" <?php if (isset($_COOKIE['username'])) echo "checked"; ?>> Recordarme</label>
        <button type="submit" name="login">Iniciar sesión</button>
    </form>
    <form method="post">
        <button name="delete_cookies">Borrar información almacenada</button>
    </form>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</body>
</html>
