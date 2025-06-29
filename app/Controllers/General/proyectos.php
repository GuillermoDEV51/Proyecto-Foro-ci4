<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;
use App\Models\ProyectosModel;

class Proyectos extends BaseController
{
public function index()
{
    $proyectosModel = new ProyectosModel();

    // Obtener los filtros si existen (de la URL)
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

    // Pasar las variables 'proyectos', 'q', 'anio', 'carrera', etc., a la vista 'proyectos'
    return view('proyectos', [
        'proyectos' => $resultados,  // Proyectos filtrados
        'q' => $q,
        'anio' => $anio,
        'carrera' => $carrera,
        'filtrosAplicados' => $filtrosAplicados  // Variable para saber si se aplicaron filtros
    ]);
}


    // Función para actualizar las imágenes de los proyectos
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

    // Función visor (sin cambios)
    public function visor($id)
    {
        $model = new ProyectosModel();
        $documento = $model->find($id);

        if (!$documento || empty($documento['pdf'])) {
            return redirect()->to('/proyectos')->with('error', 'PDF no encontrado');
        }

        // Obtener el tamaño del archivo
        $filePath = FCPATH . 'uploads/' . $documento['pdf'];
        $documento['size'] = (file_exists($filePath)) ? $this->formatSize(filesize($filePath)) : 'Desconocido';

        return view('visor', ['documento' => $documento]);
    }

    // Función para formatear el tamaño del archivo en un formato legible (KB, MB, GB)
    private function formatSize($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $power = $bytes > 0 ? floor(log($bytes, 1024)) : 0;
        return number_format($bytes / pow(1024, $power), 2) . ' ' . $units[$power];
    }
}
