<?php

namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{

    protected $table            = 'roles';         // Nombre de tu tabla cambien a el nombre de us tabla usuarios
    protected $primaryKey       = 'id';               // Ajusta si tu PK tiene otro nombre

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'id',           // rol ID
        'Rol'         // campo para el nombre del rol
    ];

    protected $useTimestamps = false; // Cambia a true si tienes created_at, updated_at

}