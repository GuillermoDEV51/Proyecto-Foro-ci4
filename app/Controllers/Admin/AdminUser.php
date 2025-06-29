<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolModel; 

class AdminUser extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        return view('admin/AdminUser');
        
    }
    public function new(): string
    {
        
        $RolModel = new RolModel();
        $data['Rol'] = $RolModel->findAll(); 

       return view('admin/AddUser', $data);

    }
    public function create()
    {
      $rules = [
            'codigo' => 'required|min_length[3]|max_length[20]|is_unique[users.codigo]',
            'contraseña' => 'required|min_length[6]|max_length[255]',
            'rol' => 'required'
        ];

        
        
    }
  
}