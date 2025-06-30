<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolModel;
use App\Models\UserModel;
use App\Models\ProyectosModel;

class AdminProyect extends BaseController
{

    public function __construct()
    {
        helper('url');
        helper('form');
    }

    public function index(): string
    {
        
        // Obtener todos los proyectos
        $protectModel = new ProyectosModel();
        $proyectos = $protectModel->findAll();

        $data = [
            
            'proyectos' => $proyectos
        ];

        return view('admin/AdminProyect', $data);
        
    }

    public function new(): string
    {
        $proyectosModel = new ProyectosModel();
        $data['proyectos'] = $proyectosModel->findAll();

        return view('admin/AddProyect', $data);
    }   
    public function create()
    {
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[100]',
            'autor' => 'required|min_length[3]|max_length[50]',
            'carrera' => 'required|min_length[3]|max_length[50]',
            'anio' => 'required|integer',
            'documento' => 'uploaded[documento]|max_size[documento,2048]|ext_in[documento,pdf,doc,docx]' // Validación del archivo
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('admin/AddProyect', $data);
        }

        $proyectosModel = new ProyectosModel();
        
        $proyectoData = [
            'titulo' => $this->request->getPost('titulo'),
            'autor' => $this->request->getPost('autor'),
            'carrera' => $this->request->getPost('carrera'),
            'anio' => $this->request->getPost('anio'),
            // 'documento' => $this->request->getFile('documento')->getName() // Aquí puedes manejar el archivo si es necesario
        ];

        $proyectosModel->insert($proyectoData);
        session()->setFlashdata('success', 'Proyecto creado exitosamente.');
        return redirect()->to(base_url('admin/AdminProyect'));
    }

  
}