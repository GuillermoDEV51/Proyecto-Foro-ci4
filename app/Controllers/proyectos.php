<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Proyecto extends BaseController
{
    public function index()
    {
        // Aquí irían los datos del listado (puedes conectar a base de datos después)
        $proyectos = [
            [
                'id' => 0,
                'titulo' => 'Sistema de Gestión Académica',
                'autor'  => 'Laura Gómez',
                'anio'   => 2024,
                'carrera' => 'Ingeniería de Sistemas',
                'pdf'    => 'academica.pdf',
                'descripcion' => 'Este documento presenta un sistema completo para gestión académica.',
            ],
            // Agrega más proyectos aquí...
        ];

        return view('proyectos', ['proyectos' => $proyectos]);
    }

    public function visor($id = null)
    {
        // Simula los datos (eventualmente cargar desde DB)
        $proyectos = [
            [
                'id' => 0,
                'titulo' => 'Sistema de Gestión Académica',
                'autor'  => 'Laura Gómez',
                'anio'   => 2024,
                'carrera' => 'Ingeniería de Sistemas',
                'pdf'    => 'academica.pdf',
                'descripcion' => 'Este documento presenta un sistema completo para gestión académica.',
            ]
        ];

        if (!isset($proyectos[$id])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('visor', ['documento' => $proyectos[$id]]);
    }
}
