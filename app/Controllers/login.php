<?php

namespace App\Controllers;

use App\Models\loginModel;

class login extends BaseController
{

    public function __construct()
    {
        helper('url');
    }



    public function index(): string
    {

        $loginModel = new loginModel();

        return view('login');
    }

    public function validar(): string
    {
        $codigo = $this->request->getPost('codigo');
        $password = $this->request->getPost('password');

        // Ejemplo de uso de las variables y retorno de una vista
        return view('login_result', ['codigo' => $codigo, 'password' => $password]);
    }
}
