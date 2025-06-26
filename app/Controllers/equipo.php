<?php

namespace App\Controllers;

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
