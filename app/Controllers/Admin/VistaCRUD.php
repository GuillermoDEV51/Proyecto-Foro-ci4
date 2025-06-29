<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class VistaCRUD extends BaseController
{

    public function __construct()
    {
        helper('url');
    }

    public function index(): string
    {
        return view('admin/VistaCRUD');
    }

}