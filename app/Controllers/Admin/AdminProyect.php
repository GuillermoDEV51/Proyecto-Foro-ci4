<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolModel;
use App\Models\UserModel;
use App\Models\ProyectosModel;

/**
 * Controlador para la administración de proyectos en el panel de administración.
 */

class AdminProyect extends BaseController
{

     /**
     * Constructor: carga los helpers necesarios.
     */
    public function __construct()
    {
        helper('url');
        helper('form');
    }

    public function index(): string
    {
        
        // Instancia el modelo de proyectos
        // Obtener todos los proyectos
        $protectModel = new ProyectosModel();
        //obtener todos los proyectos
        $proyectos = $protectModel->findAll();

        //Preparando los datos para la vista
        $data = [
            
            'proyectos' => $proyectos
        ];
        // Cargar la vista con los datos
        return view('admin/AdminProyect', $data);
        
    }


    /**
     * Muestra el formulario para agregar un nuevo proyecto.
     *
     * 
     */
    public function new(): string
    {

        $proyectosModel = new ProyectosModel();
         // Obtiene todos los proyectos
        $data['proyectos'] = $proyectosModel->findAll();

        // Retorna la vista para agregar un nuevo proyecto
        return view('admin/AddProyect', $data);
    }   

    /**
     * Crea un nuevo proyecto.
     *
     * Valida los datos del formulario y guarda el proyecto en la base de datos.
     * Si hay errores de validación, muestra el formulario nuevamente con los errores.
     */
    public function create()
    {
        // Reglas de validación para el formulario
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[100]|is_unique[proyectos.titulo]',
            'autor' => 'required|min_length[3]|max_length[50]',
            'carrera' => 'required|in_list[Ingeniería de Informática,Ingeniería Marítima,Ingeniería Ambiental]',
            'anio' => 'required|integer',
            'documento' => 'uploaded[documento]|max_size[documento,2048]|ext_in[documento,pdf]', // Validación del archivo
            'descripcion' => 'required|min_length[10]|max_length[500]'
        ];
        // Si la validación falla, retorna al formulario con los errores
        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('admin/AddProyect', $data);
        }

        $proyectosModel = new ProyectosModel();

         // Procesa el archivo subido
        $file = $this->request->getFile('documento');
        $nombreArchivo = $file->getClientName();
        $file->move(FCPATH . 'uploads', $nombreArchivo);

        // Prepara los datos para insertar en la base de datos

        $proyectoData = [
            'titulo' => $this->request->getPost('titulo'),
            'autor' => $this->request->getPost('autor'),
            'carrera' => $this->request->getPost('carrera'),
            'anio' => $this->request->getPost('anio'),
            'descripcion' => $this->request->getPost('descripcion'), // Nueva descripción
            'pdf' => $nombreArchivo
        ];

         // Inserta el nuevo proyecto
        $proyectosModel->insert($proyectoData);
        // Mensaje de éxito
        session()->setFlashdata('success', 'Proyecto creado exitosamente.');
        // Redirige a la lista de proyectos
        return redirect()->to(base_url('admin/AdminProyect'));
    }


    /**
     * Muestra el formulario para editar un proyecto existente.
     */
    public function edit($id)
    {
        $proyectosModel = new ProyectosModel();
        // Busca el proyecto por su ID
        $data['proyecto'] = $proyectosModel->find($id);

        // Si no se encuentra el proyecto, redirige con error
        if (!$data['proyecto']) {
            return redirect()->to(base_url('admin/AdminProyect'))->with('error', 'Proyecto no encontrado.');
        }
        // Retorna la vista de edición con los datos del proyecto
        return view('admin/EditProyect', $data);
    }


    /**
     * Actualiza un proyecto existente.
     *
     * Valida los datos del formulario y actualiza el proyecto en la base de datos.
     * Si hay errores de validación, muestra el formulario nuevamente con los errores.
     */

   public function update($id)
    {
        // Reglas de validación para la actualización
        $rules = [
            'titulo' => 'required|min_length[3]|max_length[100]|is_unique[proyectos.titulo,id,' . $id . ']',
            'autor' => 'required|min_length[3]|max_length[50]',
            'carrera' => 'required|in_list[Ingeniería de Informatica,Ingeniería Maritima,Ingeniería de Ambiental]',
            'anio' => 'required|integer',
            'documento' => 'if_exist|max_size[documento,2048]|ext_in[documento,pdf,doc,docx]', // Validación del archivo
            'descripcion' => 'required|min_length[10]|max_length[500]' // validación para la descripción
        ];

        // Si la validación falla, retorna al formulario con los errores
        if (!$this->validate($rules)) {
            $proyectosModel = new ProyectosModel();
            $data['proyecto'] = $proyectosModel->find($id);
            $data['validation'] = $this->validator;
            return view('admin/EditProyect', $data);
        }

        $proyectosModel = new ProyectosModel();
         // Obtiene el archivo subido (si existe)
        $file = $this->request->getFile('documento');
        $nombreArchivo = $this->request->getPost('pdf_actual'); // Por defecto, el anterior

         // Si se subió un nuevo archivo, lo procesa
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $nombreArchivo = $file->getClientName();
            $file->move(FCPATH . 'uploads', $nombreArchivo);
        }
        // Prepara los datos actualizados
        $proyectoData = [
            'titulo' => $this->request->getPost('titulo'),
            'autor' => $this->request->getPost('autor'),
            'carrera' => $this->request->getPost('carrera'),
            'anio' => $this->request->getPost('anio'),
            'descripcion' => $this->request->getPost('descripcion'), // Nueva descripción
            'pdf' => $nombreArchivo
        ];
         // Actualiza el proyecto en la base de datos
        $proyectosModel->update($id, $proyectoData);
        // Mensaje de éxito
        session()->setFlashdata('success', 'Proyecto actualizado exitosamente.');
        // Redirige a la lista de proyecto
        return redirect()->to(base_url('admin/AdminProyect'));
    }

    /**
     * Elimina un proyecto existente.
     *
     * Elimina el proyecto de la base de datos y el archivo asociado del sistema de archivos.
     */
    public function delete($id)
    {
        $proyectosModel = new ProyectosModel();
        // Busca el proyecto por su ID
        $proyecto = $proyectosModel->find($id);

         // Si no se encuentra el proyecto, redirige con error
        if (!$proyecto) {
            return redirect()->to(base_url('admin/AdminProyect'))->with('error', 'Proyecto no encontrado.');
        }

        // Eliminar el archivo del sistema de archivos
        if (file_exists(FCPATH . 'uploads/' . $proyecto['pdf'])) {
            unlink(FCPATH . 'uploads/' . $proyecto['pdf']);
        }

        // Elimina el proyecto de la base de datos
        $proyectosModel->delete($id);
        // Mensaje de éxito
        session()->setFlashdata('success', 'Proyecto eliminado exitosamente.');
         // Redirige a la lista de proyectos
        return redirect()->to(base_url('admin/AdminProyect'));
    }
    
}