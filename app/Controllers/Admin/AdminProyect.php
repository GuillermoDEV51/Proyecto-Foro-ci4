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
            'titulo' => 'required|min_length[3]|max_length[100]|is_unique[proyectos.titulo]',
            'autor' => 'required|min_length[3]|max_length[50]',
            'carrera' => 'required|in_list[Ingeniería de Informática,Ingeniería Marítima,Ingeniería Ambiental]',
            'anio' => 'required|integer',
            'documento' => 'uploaded[documento]|max_size[documento,2048]|ext_in[documento,pdf]' // Validación del archivo
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('admin/AddProyect', $data);
        }

        $proyectosModel = new ProyectosModel();

        $file = $this->request->getFile('documento');
        $nombreArchivo = $file->getClientName();
        $file->move(FCPATH . 'uploads', $nombreArchivo);

        $proyectoData = [
            'titulo' => $this->request->getPost('titulo'),
            'autor' => $this->request->getPost('autor'),
            'carrera' => $this->request->getPost('carrera'),
            'anio' => $this->request->getPost('anio'),
            'pdf' => $nombreArchivo
        ];

        $proyectosModel->insert($proyectoData);
        session()->setFlashdata('success', 'Proyecto creado exitosamente.');
        return redirect()->to(base_url('admin/AdminProyect'));
    }
    public function edit($id)
    {
        $proyectosModel = new ProyectosModel();
        $data['proyecto'] = $proyectosModel->find($id);

        if (!$data['proyecto']) {
            return redirect()->to(base_url('admin/AdminProyect'))->with('error', 'Proyecto no encontrado.');
        }

        return view('admin/EditProyect', $data);
    }

   public function update($id)
    {
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[100]|is_unique[proyectos.titulo,id,' . $id . ']',
            'autor' => 'required|min_length[3]|max_length[50]',
            'carrera' => 'required|in_list[Ingeniería de Informatica,Ingeniería Maritima,Ingeniería de Ambiental]',
            'anio' => 'required|integer',
            'documento' => 'uploaded[documento]|max_size[documento,2048]|ext_in[documento,pdf,doc,docx]' // Validación del archivo
        ];

        if (!$this->validate($rules)) {
            $proyectosModel = new ProyectosModel();
            $data['proyecto'] = $proyectosModel->find($id);
            $data['validation'] = $this->validator;
            return view('admin/EditProyect', $data);
        }

        $proyectosModel = new ProyectosModel();
        $file = $this->request->getFile('documento');
        $nombreArchivo = $this->request->getPost('pdf_actual'); // Por defecto, el anterior

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $nombreArchivo = $file->getClientName();
            $file->move(FCPATH . 'uploads', $nombreArchivo);
        }

        $proyectoData = [
            'titulo' => $this->request->getPost('titulo'),
            'autor' => $this->request->getPost('autor'),
            'carrera' => $this->request->getPost('carrera'),
            'anio' => $this->request->getPost('anio'),
            'pdf' => $nombreArchivo
        ];

        $proyectosModel->update($id, $proyectoData);
        session()->setFlashdata('success', 'Proyecto actualizado exitosamente.');
        return redirect()->to(base_url('admin/AdminProyect'));
    }
    public function delete($id)
    {
        $proyectosModel = new ProyectosModel();
        $proyecto = $proyectosModel->find($id);

        if (!$proyecto) {
            return redirect()->to(base_url('admin/AdminProyect'))->with('error', 'Proyecto no encontrado.');
        }

        // Eliminar el archivo del sistema de archivos
        if (file_exists(FCPATH . 'uploads/' . $proyecto['pdf'])) {
            unlink(FCPATH . 'uploads/' . $proyecto['pdf']);
        }

        $proyectosModel->delete($id);
        session()->setFlashdata('success', 'Proyecto eliminado exitosamente.');
        return redirect()->to(base_url('admin/AdminProyect'));
    }
    
}