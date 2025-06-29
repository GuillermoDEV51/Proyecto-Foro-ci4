<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;

class AyudaUsuario extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('user/ayudausuario');
    }
}
