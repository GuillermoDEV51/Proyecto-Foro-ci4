<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectosModel extends Model
{
    protected $table = 'proyectos'; // nombre de tu tabla
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo', 'autor', 'anio', 'carrera', 'imagen', 'pdf', 'descripcion', 'size', 'destacado'];
}
namespace App\Controllers\General;

use App\Controllers\BaseController;

use App\Models\ProyectosModel; // <-- importante

class Home extends BaseController
{
    public function __construct()
    {
        helper(filenames: 'url');
    }

    public function index()
    {
        $proyectosModel = new ProyectosModel();

        // Obtener los documentos destacados desde la base de datos
        $destacados = $proyectosModel
            ->where('destacado', 1)
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->findAll();

        return view('home', ['destacados' => $destacados]);
    }
    
}
