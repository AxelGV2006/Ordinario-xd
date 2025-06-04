<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "tienda_usuarios";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifrar la contraseña

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $password);

if ($stmt->execute()) {
    echo "Registro exitoso!";
} else {
    echo "Error en el registro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>