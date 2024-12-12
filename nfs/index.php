<?php
// index.php

// Configuración básica
$server_ip = $_SERVER['SERVER_ADDR'] ?? 'localhost';
$client_ip = $_SERVER['REMOTE_ADDR'] ?? 'Desconocida';
$php_version = phpversion();
$current_time = date('Y-m-d H:i:s');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo NGINX + PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido a tu servidor NGINX + PHP!</h1>
        <p>Esta es una página servida utilizando <strong>NGINX</strong> y procesada con <strong>PHP</strong>.</p>
        <hr>
        <h2>Detalles del servidor</h2>
        <ul>
            <li><strong>IP del servidor:</strong> <?php echo htmlspecialchars($server_ip); ?></li>
            <li><strong>IP del cliente:</strong> <?php echo htmlspecialchars($client_ip); ?></li>
            <li><strong>Versión de PHP:</strong> <?php echo htmlspecialchars($php_version); ?></li>
            <li><strong>Hora actual:</strong> <?php echo htmlspecialchars($current_time); ?></li>
        </ul>
        <hr>
        <p>¡Todo está funcionando correctamente! 🎉</p>
    </div>
</body>
</html>