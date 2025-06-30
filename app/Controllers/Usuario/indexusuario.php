<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;
use App\Models\ProyectosModel;

class IndexUsuario extends BaseController
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

        // Obtener los proyectos destacados desde la base de datos
        $destacados = $proyectosModel
            ->where('destacado', 1)
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->findAll();

        // Pasar los proyectos destacados a la vista
        return view('user/indexusuario', ['destacados' => $destacados]);
    }
}
