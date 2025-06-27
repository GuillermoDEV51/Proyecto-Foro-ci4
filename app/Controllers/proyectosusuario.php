<?php

namespace App\Controllers;

class proyectosusuario extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('user/proyectosusuario');
    }
}
