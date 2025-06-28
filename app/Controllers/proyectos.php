<?php

namespace App\Controllers;

use App\Models\ProyectosModel;

class Proyectos extends BaseController
{
    public function index()
    {
        $proyectosModel = new ProyectosModel();
        $proyectos = $proyectosModel->findAll();

        return view('proyectos', ['proyectos' => $proyectos]);
    }
    public function visor($id)
{
    $model = new \App\Models\ProyectosModel();
    $documento = $model->find($id);

    if (!$documento || empty($documento['pdf'])) {
        return redirect()->to('/proyectos')->with('error', 'PDF no encontrado');
    }

    return view('visor', ['documento' => $documento]);
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
}


