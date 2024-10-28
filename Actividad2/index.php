<?php
if (!isset($_GET['test'])) {
    setcookie("test_cookie", "test", time() + 3600, "/");
    header("Location: index.php?test=1");
    exit();
}

$permite_cookies = isset($_COOKIE['test_cookie']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comprobar Cookies</title>
</head>
<body>
    <?php if ($permite_cookies): ?>
        <p>El navegador permite cookies.</p>
    <?php else: ?>
        <p>El navegador no permite cookies.</p>
    <?php endif; ?>
</body>
</html>
