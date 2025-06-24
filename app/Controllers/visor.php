<?php

namespace App\Controllers;

class visor extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        return view('visor');
    }

}