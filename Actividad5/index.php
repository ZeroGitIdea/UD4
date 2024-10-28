<?php
date_default_timezone_set('America/Argentina/Buenos_Aires'); // Ajusta la zona horaria según tu ubicación

if (isset($_COOKIE['ultimo_acceso'])) {
    $ultimo_acceso = $_COOKIE['ultimo_acceso'];
    $segundos_pasados = time() - $ultimo_acceso;
    $mensaje_tiempo = "Han pasado " . gmdate("H:i:s", $segundos_pasados) . " desde tu última visita.";
    
    // Mensaje personalizado
    if ($segundos_pasados < 3600) {
        $mensaje_personalizado = "¡Bienvenido de nuevo tan pronto!";
    } elseif ($segundos_pasados < 86400) {
        $mensaje_personalizado = "¡Qué gusto verte otra vez hoy!";
    } else {
        $mensaje_personalizado = "¡Hace tiempo que no te veíamos!";
    }
} else {
    $mensaje_tiempo = "Es tu primera visita o han pasado muchos días.";
    $mensaje_personalizado = "¡Bienvenido a nuestra página!";
}

setcookie("ultimo_acceso", time(), time() + 86400 * 365); // 1 año para el último acceso
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tiempo desde Último Acceso</title>
</head>
<body>
    <p><?php echo $mensaje_tiempo; ?></p>
    <p><?php echo $mensaje_personalizado; ?></p>
</body>
</html>
