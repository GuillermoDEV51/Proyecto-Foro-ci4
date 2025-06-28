<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class testdb extends Controller
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            // Forzar una consulta para comprobar la conexión real
            $db->query('SELECT 1');
            echo "¡Conexión a la base de datos exitosa!";
        } catch (\Throwable $e) {
            echo "Error al conectar con la base de datos: " . $e->getMessage();
        }
    }
}