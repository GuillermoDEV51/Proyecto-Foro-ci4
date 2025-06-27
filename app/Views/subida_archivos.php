<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "forum_proyectos");
if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Validar que se haya subido un archivo correctamente
if (!isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
    die("⚠️ Error al subir el archivo.");
}

$nombre = $_FILES["archivo"]["name"];
$tipo = pathinfo($nombre, PATHINFO_EXTENSION);
$tmp = $_FILES["archivo"]["tmp_name"];

// Preparar ruta de guardado
$carpeta_destino = "subida_archivos/";
$ruta = $carpeta_destino . $nombre;

// Asegurarse de que la carpeta exista
if (!is_dir($carpeta_destino)) {
    mkdir($carpeta_destino, 0777, true);
}

// Buscar el tipo de archivo en la tabla tipos_archivo
$query_tipo = "SELECT id FROM tipos_archivo WHERE extension = '$tipo'";
$resultado_tipo = $conexion->query($query_tipo);

if ($resultado_tipo && $resultado_tipo->num_rows > 0) {
    $fila_tipo = $resultado_tipo->fetch_assoc();
    $tipo_id = $fila_tipo["id"];

    // Validar si ya existe un archivo con el mismo nombre
    $query_existente = "SELECT id FROM archivos WHERE nombre_archivo = '$nombre'";
    $resultado_existente = $conexion->query($query_existente);

    if ($resultado_existente && $resultado_existente->num_rows > 0) {
        die("⚠️ Ya existe un archivo con ese nombre.");
    }

    // Mover archivo y registrar en la base de datos
    if (move_uploaded_file($tmp, $ruta)) {
        $query_insert = "INSERT INTO archivos (nombre_archivo, tipo_id, visibilidad) VALUES ('$nombre', '$tipo_id', 'publico')";
        if ($conexion->query($query_insert)) {
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