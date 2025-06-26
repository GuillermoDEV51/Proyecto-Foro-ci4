<?php
$conn = new mysqli('localhost', 'root', '', 'proyecto_foro_ci4');
if ($conn->connect_error) {
    die("Fallo la conexión: " . $conn->connect_error);
}
echo "Conexión exitosa!";