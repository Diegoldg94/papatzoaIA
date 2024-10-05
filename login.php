<?php
session_start();
require 'db.php';  // Conectar a la base de datos

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consultar si el usuario existe en la base de datos
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE nombre_usuario = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Validar si el usuario existe y la contraseña es correcta
    if ($user && md5($password) === $user['contraseña']) {
        $_SESSION['username'] = $username;  // Almacenar nombre de usuario en la sesión
        $_SESSION['rol'] = $user['rol'];    // Guardar el rol del usuario

        // Redirigir al usuario según su rol
        header("Location: " . $user['pagina']);
        exit();
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        echo "Usuario o contraseña incorrectos";
    }
}
?>
