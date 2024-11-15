// archivo conexion.php
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'relecar';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
<?php
include 'conexion.php';
// Tu código PHP para interactuar con la base de datos
?>


