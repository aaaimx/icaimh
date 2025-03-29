<?php
require __DIR__ . '/../../vendor/autoload.php'; // Ajusta la ruta según tu estructura

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Accede a las variables de entorno
$host = $_ENV['DB_HOST'];
$usuario = $_ENV['DB_USERNAME'];
$contrasena = $_ENV['DB_PASSWORD'];
$base_datos = $_ENV['DB_DATABASE'];

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
