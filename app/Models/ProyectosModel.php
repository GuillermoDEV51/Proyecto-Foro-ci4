<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectosModel extends Model
{
    protected $table      = 'proyectos'; // Nombre de la tabla
    protected $primaryKey = 'id';       // Nombre de la columna clave primaria

    protected $allowedFields = ['titulo', 'anio', 'carrera', 'autor', 'imagen', 'pdf', 'descripcion']; // Campos que puedes actualizar

  
}
