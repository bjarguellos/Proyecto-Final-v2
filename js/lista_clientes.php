<?php
include 'conexion.php';

$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nombre completo: " . $row['nombre_completo'] . " - Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No se encontraron clientes.";
}
$conn->close();
?>
