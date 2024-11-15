<?php
include 'conexion.php';

if (isset($_GET['nombre_usuario'])) {
    $nombre_usuario = $_GET['nombre_usuario'];
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        echo "Nombre completo: " . $usuario['nombre_completo'];
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}
$conn->close();
?>
