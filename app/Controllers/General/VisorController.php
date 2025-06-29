<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

use CodeIgniter\Controller;

class VisorController extends Controller
{
    public function index($id)
    {
        // Array estático igual al de proyectos.php
        $proyectos = [
            [
                'id' => 101,
                'titulo' => 'Sistema de Gestión Académica',
                'autor'  => 'Laura Gómez',
                'anio'   => 2024,
                'carrera' => 'Ingeniería de Sistemas',
                'imagen' => 'https://source.unsplash.com/collection/190731/300x200'
            ],
            // ... todos los demás proyectos
        ];

        foreach ($proyectos as $p) {
            if ($p['id'] == $id) {
                return view('visor', ['proyecto' => $p]);
            }
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
}
