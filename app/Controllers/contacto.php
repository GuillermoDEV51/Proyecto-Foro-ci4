<?php

namespace App\Controllers;

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