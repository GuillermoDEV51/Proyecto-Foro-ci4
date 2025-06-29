<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;

class VisorUsuario extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('user/visorusuario');
    }
}
