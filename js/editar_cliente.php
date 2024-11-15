<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE clientes SET nombre_completo = ?, email = ?, telefono = ?, direccion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $nombre_completo, $email, $telefono, $direccion, $id);

    if ($stmt->execute()) {
        echo "Cliente actualizado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
