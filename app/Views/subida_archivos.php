<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "ci4_crud_app");
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Validar campos del formulario
if (
    !isset($_POST["autor"], $_POST["carrera"], $_POST["anio"]) ||
    empty($_POST["autor"]) || empty($_POST["carrera"]) || empty($_POST["anio"])
) {
    die("⚠️ Faltan datos obligatorios del formulario.");
}

$autor = $conexion->real_escape_string(trim($_POST["autor"]));
$carrera = $conexion->real_escape_string(trim($_POST["carrera"]));
$anio = intval($_POST["anio"]);

// Validar archivo
if (!isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
    die("⚠️ Error al subir el archivo.");
}

$nombre = basename($_FILES["archivo"]["name"]);
$tipo = strtolower(pathinfo($nombre, PATHINFO_EXTENSION));
$tmp = $_FILES["archivo"]["tmp_name"];

// Validar tipo permitido
$extensiones_permitidas = ["pdf", "doc", "docx"];
if (!in_array($tipo, $extensiones_permitidas)) {
    die("⚠️ Solo se permiten archivos PDF o Word (.doc, .docx).");
}

// Carpeta de destino
$carpeta_destino = "subida_archivos/";
$ruta = $carpeta_destino . $nombre;

if (!is_dir($carpeta_destino)) {
    mkdir($carpeta_destino, 0777, true);
}

// Buscar tipo de archivo
$query_tipo = "SELECT id FROM tipos_archivo WHERE extension = ?";
$stmt_tipo = $conexion->prepare($query_tipo);
$stmt_tipo->bind_param("s", $tipo);
$stmt_tipo->execute();
$resultado_tipo = $stmt_tipo->get_result();

if ($resultado_tipo && $resultado_tipo->num_rows > 0) {
    $fila_tipo = $resultado_tipo->fetch_assoc();
    $id_tipo = $fila_tipo["id"];

    // Mover archivo y registrar
    if (move_uploaded_file($tmp, $ruta)) {
        $query_insert = "INSERT INTO proyectos (titulo, autor, carrera, anio, id_tipo) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conexion->prepare($query_insert);
        $stmt_insert->bind_param("sssii", $nombre, $autor, $carrera, $anio, $id_tipo);

        if ($stmt_insert->execute()) {
            echo "✅ Archivo subido y registrado correctamente.";
        } else {
            echo "❌ Error al guardar en la base de datos: " . $conexion->error;
        }
    } else {
        echo "❌ No se pudo mover el archivo al destino.";
    }

} else {
    echo "⚠️ La extensión '$tipo' no está registrada en la tabla tipos_archivo.";
}

$conexion->close();
?>