<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

use App\Models\ProyectosModel;

class Visor extends BaseController
{
    public function __construct()
    {
        helper(['url', 'filesystem']);
    }

    public function visor($id)
    {
        $model = new ProyectosModel();
        $documento = $model->find($id);

        if (!$documento) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Proyecto no encontrado.");
        }

        // Ruta del PDF (cambia si tu carpeta es distinta)
        $pdfPath = FCPATH . 'uploads/' . $documento['pdf'];

        if (file_exists($pdfPath)) {
            $sizeBytes = filesize($pdfPath);
            $documento['size'] = $this->formatBytes($sizeBytes);
        } else {
            $documento['size'] = 'Desconocido';
        }

        // Retornar la vista con los datos del proyecto
        return view('visor', ['documento' => $documento]);
    }

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
