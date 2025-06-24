<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Convierte la variable de entorno en un booleano
$registration_open = filter_var($_ENV['REGISTRATION_OPEN'], FILTER_VALIDATE_BOOLEAN);
