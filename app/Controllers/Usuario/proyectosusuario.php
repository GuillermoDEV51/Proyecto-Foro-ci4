<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;
use App\Models\ProyectosModel;

class Proyectosusuario extends BaseController
{
    public function __construct()
    {
        helper(['url']);
        
        // Verificar si la sesión del usuario está activa
        if (!session()->get('user')) {
            return redirect()->to('login'); // Redirigir al login si no está autenticado
        }
    }

    public function index()
    {
        $proyectosModel = new ProyectosModel();

        // Obtener los filtros si existen (de la URL)
        $q = $this->request->getGet('q');
        $anio = $this->request->getGet('anio');
        $carrera = $this->request->getGet('carrera');

        // Filtrar todos los proyectos
        $builder = $proyectosModel->builder();

        // Si existe el filtro de búsqueda, aplicar
        if (!empty($q)) {
            $builder->groupStart()
                ->like('titulo', $q)
                ->orLike('autor', $q)
                ->groupEnd();
        }

        // Si existe el filtro de año, aplicar
        if (!empty($anio)) {
            $builder->where('anio', $anio);
        }

        // Si existe el filtro de carrera, aplicar
        if (!empty($carrera)) {
            $builder->where('carrera', $carrera);
        }

        // Obtener los proyectos filtrados
        $resultados = $builder->get()->getResultArray();

        // Verificar si hay filtros aplicados
        $filtrosAplicados = !empty($q) || !empty($anio) || !empty($carrera);

        // Pasar las variables 'proyectos', 'q', 'anio', 'carrera', etc., a la vista 'proyectos'
        return view('user/proyectosusuario', [
            'proyectos' => $resultados,  // Proyectos filtrados
            'q' => esc($q),              // Escapar las variables para evitar XSS
            'anio' => esc($anio),
            'carrera' => esc($carrera),
            'filtrosAplicados' => $filtrosAplicados  // Variable para saber si se aplicaron filtros
        ]);
    }
}
