<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolModel;
use App\Models\UserModel;
 use App\Models\ProyectosModel;

class VistaCRUD extends BaseController
{
    // Constructor: carga los helpers necesarios
    public function __construct()
    {
        helper('url');
        helper('form');
    }

    // Muestra la vista principal con usuarios, roles y proyectos
    public function index(): string
    {
        // Instancia el modelo de roles y obtiene todos los roles
        $RolModel = new RolModel();
        $roles = $RolModel->findAll();
        // Instancia el modelo de usuarios y obtiene todos los usuarios
        $userModel = new UserModel();
        $users = $userModel->findAll();

        // Instancia el modelo de proyectos
        $proyectosModel = new ProyectosModel();
        // Prepara los datos para la vista
        $data = [
            'users' => $users,
            'roles' => $roles,
            'proyectos' => $proyectosModel->findAll(),

        ];
    // Retorna la vista con los datos
    return view('admin/VistaCRUD', $data);
        
    }

    public function addUser(): string
    {
        return view('admin/AñadirUser');
    }

}