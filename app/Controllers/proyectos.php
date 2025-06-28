<?php

namespace App\Controllers;

use App\Models\ProyectosModel;

class Proyectos extends BaseController
{
public function index()
{
    $proyectosModel = new ProyectosModel();

    // Obtener todos los proyectos
    $proyectos = $proyectosModel->findAll();

    // Obtener los filtros si existen
    $q = $this->request->getGet('q');
    $anio = $this->request->getGet('anio');
    $carrera = $this->request->getGet('carrera');

    // Filtrar todos los proyectos
    $builder = $proyectosModel->builder();

    if (!empty($q)) {
        $builder->groupStart()
            ->like('titulo', $q)
            ->orLike('autor', $q)
            ->groupEnd();
    }

    if (!empty($anio)) {
        $builder->where('anio', $anio);
    }

    if (!empty($carrera)) {
        $builder->where('carrera', $carrera);
    }

    // Obtener los proyectos filtrados
    $resultados = $builder->get()->getResultArray();

    // Verificar si hay filtros aplicados
    $filtrosAplicados = !empty($q) || !empty($anio) || !empty($carrera);

    // Pasar las variables 'proyectos', 'destacados', etc., a la vista 'proyectos'
    return view('proyectos', [
        'proyectos' => $resultados,  // Proyectos filtrados
        'q' => $q,
        'anio' => $anio,
        'carrera' => $carrera,
        'filtrosAplicados' => $filtrosAplicados  // Variable para saber si se aplicaron filtros
    ]);
}


    public function actualizarImagenes()
    {
        $proyectos = [
            1 => 'proyecto1.jpg',
            2 => 'proyecto2.jpg',
            3 => 'proyecto3.jpg',
        ];

        $proyectosModel = new ProyectosModel();

        foreach ($proyectos as $id => $imagen) {
            $proyectosModel->update($id, ['imagen' => $imagen]);
        }

        return redirect()->to('/proyectos')->with('success', 'Imágenes actualizadas correctamente');
    }

    public function buscar()
    {
        $model = new ProyectosModel();

        // Obtener los filtros
        $q = $this->request->getGet('q');
        $anio = $this->request->getGet('anio');
        $carrera = $this->request->getGet('carrera');

        $builder = $model->builder();

        // Filtrar por título o autor
        if (!empty($q)) {
            $builder->groupStart()
                ->like('titulo', $q)
                ->orLike('autor', $q)
                ->groupEnd();
        }

        // Filtrar por año
        if (!empty($anio)) {
            $builder->where('anio', $anio);
        }

        // Filtrar por carrera
        if (!empty($carrera)) {
            $builder->where('carrera', $carrera);
        }

        // Obtener los resultados
        $resultados = $builder->get()->getResultArray();

        // Devolver los resultados a la vista de proyectos
        return view('proyectos', [
            'proyectos' => $resultados,  // Proyectos filtrados
            'q' => $q,                   // Parámetro de búsqueda
            'anio' => $anio,             // Año seleccionado
            'carrera' => $carrera        // Carrera seleccionada
        ]);
    }

    public function visor($id)
    {
        $model = new ProyectosModel();
        $documento = $model->find($id);

        if (!$documento || empty($documento['pdf'])) {
            return redirect()->to('/proyectos')->with('error', 'PDF no encontrado');
        }

        return view('visor', data: ['documento' => $documento]);
    }
}
