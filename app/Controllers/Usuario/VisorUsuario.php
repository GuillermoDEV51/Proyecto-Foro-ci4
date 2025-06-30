<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;
use App\Models\ProyectosModel;

class Visorusuario extends BaseController
{
    public function __construct()
    {
        helper(['url', 'filesystem']);
    }

    public function index($id = null)
    {
        // Verifica si se ha pasado el ID y carga el modelo
        $proyectosModel = new ProyectosModel();

        // Obtiene el proyecto basado en el ID
        $documento = $proyectosModel->find($id);

        // Verifica si el documento existe
        if (!$documento) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Documento no encontrado");
        }

        // Ruta del PDF (ajustar a tu carpeta de archivos PDF)
        $pdfPath = FCPATH . 'uploads/' . $documento['pdf'];

        // Verifica si el archivo existe y obtiene el tamaño
        if (file_exists($pdfPath)) {
            $sizeBytes = filesize($pdfPath);
            $documento['size'] = $this->formatBytes($sizeBytes);
        } else {
            $documento['size'] = 'Desconocido';
        }

        // Pasa el documento a la vista
        return view('user/visorusuario', ['documento' => $documento]);
    }

    // Función para formatear el tamaño de archivo a una forma legible
    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
