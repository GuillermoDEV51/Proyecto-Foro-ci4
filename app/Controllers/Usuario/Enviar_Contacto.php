<?php

namespace App\Controllers\Usuario;
use App\Controllers\BaseController;

class Enviar_Contacto extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('user/Enviar_contacto');
    }
}
