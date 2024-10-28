<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create') {
        setcookie("mi_cookie", "Esta es una cookie de duración limitada", time() + 3600); // 1 hora
        $message = "Cookie creada y configurada para expirar en 1 hora.";
    } elseif ($action === 'check') {
        $message = isset($_COOKIE['mi_cookie']) ? "Cookie activa: " . $_COOKIE['mi_cookie'] : "La cookie no existe o ha expirado.";
    } elseif ($action === 'delete') {
        setcookie("mi_cookie", "", time() - 3600); // Expira la cookie
        $message = "Cookie eliminada.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestor de Cookies</title>
</head>
<body>
    <h2>Gestión de Cookie de Duración Limitada</h2>
    <form method="post">
        <button name="action" value="create">Crear Cookie</button>
        <button name="action" value="check">Comprobar Cookie</button>
        <button name="action" value="delete">Eliminar Cookie</button>
    </form>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
</body>
</html>
