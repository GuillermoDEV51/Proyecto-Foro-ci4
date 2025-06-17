<?php

namespace App\Controllers;

class proyectos extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        return view('proyectos');
    }

}