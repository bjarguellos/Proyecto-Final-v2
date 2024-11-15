<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO clientes (nombre_completo, email, telefono, direccion) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre_completo, $email, $telefono, $direccion);

    if ($stmt->execute()) {
        echo "Cliente registrado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
