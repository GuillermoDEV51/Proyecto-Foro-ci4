<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ProyectosModel; // Asegúrate de tener este modelo

class UserController extends BaseController
{
    public function index()
    {
        // Crear una instancia del modelo de proyectos
        $proyectosModel = new ProyectosModel();
        
        // Obtener los proyectos destacados (ajusta la lógica según sea necesario)
        $proyectosDestacados = $proyectosModel->findAll(); // Puedes usar un filtro aquí si necesitas proyectos específicos

        // Pasar los proyectos a la vista
        return view('user/indexusuario', [
            'proyectosDestacados' => $proyectosDestacados
        ]);
    }
}
 