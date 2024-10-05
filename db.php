<?php
$host = 'localhost';  // Si estás usando XAMPP, esto es "localhost"
$db   = 'gestion_salud_mental';  // Nombre de la base de datos
$user = 'root';  // El usuario por defecto es 'root'
$pass = '';  // Si no tienes contraseña, deja este campo vacío
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
