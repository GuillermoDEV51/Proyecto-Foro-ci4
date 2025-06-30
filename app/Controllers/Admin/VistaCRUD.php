<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolModel;
use App\Models\UserModel;
 use App\Models\ProyectosModel;

class VistaCRUD extends BaseController
{

    public function __construct()
    {
        helper('url');
        helper('form');
    }

    public function index(): string
    {
        $RolModel = new RolModel();
    $roles = $RolModel->findAll();

    $userModel = new UserModel();
    $users = $userModel->findAll();


        $proyectosModel = new ProyectosModel();

    $data = [
        'users' => $users,
        'roles' => $roles,
        
    ];

    return view('admin/VistaCRUD', $data);
        
    }

    public function addUser(): string
    {
        return view('admin/AñadirUser');
    }

}