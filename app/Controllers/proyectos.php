<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Proyectos extends BaseController
{
    private array $proyectos = [
        [
            'id' => 101,
            'titulo' => 'Tecnologia Digital',
            'autor'  => 'Jonathan Alarcon',
            'anio'   => 2024,
            'carrera' => 'Ingeniería Informática',
            'pdf'    => 'Tecnologia.pdf',
            'descripcion' => 'Este documento presenta un sumador en TEC.',
        ],
                [
            'id' => 102,
            'titulo' => 'Tecnologia Digital',
            'autor'  => 'Jonathan Alarcon',
            'anio'   => 2024,
            'carrera' => 'Ingeniería Informática',
            'pdf'    => 'parcial.pdf',
            'descripcion' => 'Este documento presenta un sumador en TEC.',
        ],
        // Puedes añadir más proyectos aquí...
    ];

    public function index()
    {
        helper('url');

        return view('proyectos', ['proyectos' => $this->proyectos]);
    }

 public function visor($id = null)
{
    helper('url');

    $proyecto = null;

    foreach ($this->proyectos as $p) {
        if ($p['id'] == $id) {
            $proyecto = $p;
            break;
        }
    }

    if ($proyecto === null) {
        throw PageNotFoundException::forPageNotFound("Proyecto con ID $id no encontrado.");
    }

// Ruta al archivo PDF
$filePath = WRITEPATH . '../public/uploads/' . $proyecto['pdf'];

if (file_exists($filePath)) {
    $sizeInBytes = filesize($filePath);
    $proyecto['size'] = $this->formatSizeUnits($sizeInBytes);
} else {
    $proyecto['size'] = 'Desconocido';
}


    return view('visor', ['documento' => $proyecto]);
}
private function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        return $bytes . ' bytes';
    } elseif ($bytes == 1) {
        return '1 byte';
    } else {
        return '0 bytes';
    }
}

 }