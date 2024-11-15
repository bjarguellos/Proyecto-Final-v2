<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios SET nombre_completo = ?, email = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre_completo, $email, $rol, $id);

    if ($stmt->execute()) {
        echo "Usuario actualizado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
