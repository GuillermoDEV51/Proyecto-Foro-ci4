<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Proyectos extends BaseController
{
    private array $proyectos = [
        [
            'id' => 101,
            'titulo' => 'Sistema de Gestión Académica',
            'autor'  => 'Laura Gómez',
            'anio'   => 2024,
            'carrera' => 'Ingeniería de Sistemas',
            'pdf'    => 'parcial',
            'descripcion' => 'Este documento presenta un sistema completo para gestión académica.',
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

    return view('visor', ['documento' => $proyecto]);
}
  }