<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (nombre_usuario, contraseña, nombre_completo, email, rol) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre_usuario, $contraseña, $nombre_completo, $email, $rol);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
