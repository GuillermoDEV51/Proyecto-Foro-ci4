<?php

namespace App\Controllers;

class TestDB2 extends BaseController
{

    public function __construct()
    {
        helper('url');
    }
    
    public function index(): string
    {
        return view('TestDB2');
    }
    
   
}
