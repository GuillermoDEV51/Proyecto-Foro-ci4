<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'users';         // Nombre de tu tabla cambien a el nombre de us tabla usuarios
    protected $primaryKey       = 'id';               // Ajusta si tu PK tiene otro nombre

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'codigo',           // campo para el usuario (login)
        'contraseña',       // campo para la contraseña 
        'id_rol'            // puedes omitir si no usas roles
    ];

    protected $useTimestamps = false; // Cambia a true si tienes created_at, updated_at

    // Reglas de validación para registro
    protected $validationRules    = [
        'codigo'     => 'required|max_length[30]|is_unique[users.codigo]', // evita duplicados y limita longitud (cambien a 'users.codigo' al nombre de tu tabla usuarios)
        'contraseña' => 'required|max_length[255]|min_length[8]',
    ];
   protected $validationMessages = [
        'codigo' => [
            'required' => 'El campo código es obligatorio.',
            'is_unique' => 'Este código ya está registrado.',
            'min_length' => 'El código debe tener al menos 3 caracteres.',
            'max_length' => 'El código no puede superar los 20 caracteres.'
        ],
        'contraseña' => [
            'required' => 'La contraseña es obligatoria.',
            'min_length' => 'La contraseña debe tener al menos 6 caracteres.',
            'max_length' => 'La contraseña no puede superar los 255 caracteres.'
        ],
        'role' => [
            'required' => 'Debe seleccionar un rol.'
        ]
    ];
    protected $skipValidation     = false;
}