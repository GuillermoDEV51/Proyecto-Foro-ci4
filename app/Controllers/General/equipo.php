<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

class equipo extends BaseController
{

    public function index(): string
    {

       
        return view('equipo');
    }

    public function __construct()
    {
        helper('url');
    }
    
}
