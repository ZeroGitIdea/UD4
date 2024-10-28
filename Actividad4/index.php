<?php
$visitas = isset($_COOKIE['visitas']) ? $_COOKIE['visitas'] + 1 : 1;
setcookie("visitas", $visitas, time() + 86400 * 365); // 1 año
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contador de Visitas</title>
</head>
<body>
    <p>Has visitado este sitio <?php echo $visitas; ?> veces.</p>
</body>
</html>
