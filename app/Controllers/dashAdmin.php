<?php

namespace App\Controllers;

class dashAdmin extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('dashAdmin');
    }
}
