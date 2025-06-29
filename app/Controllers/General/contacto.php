<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

class contacto extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        return view('contacto');
    }

}