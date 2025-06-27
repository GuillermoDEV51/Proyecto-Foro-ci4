<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'usuarios2';
    protected $primaryKey = 'id';

    protected $allowedFields = ['codigo', 'password', 'Rol'];
}