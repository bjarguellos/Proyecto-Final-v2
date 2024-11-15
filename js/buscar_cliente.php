<?php
include 'conexion.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "SELECT * FROM clientes WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        echo "Nombre completo: " . $cliente['nombre_completo'];
    } else {
        echo "Cliente no encontrado.";
    }

    $stmt->close();
}
$conn->close();
?>
