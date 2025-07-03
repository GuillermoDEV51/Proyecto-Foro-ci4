<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolModel; 

class AdminUser extends BaseController
{
    // Constructor: carga los helpers necesarios
    public function __construct()
    {
        helper('url');
        helper('form');
    }

    // Muestra la lista de usuarios y roles
    public function index(): string
{
    $RolModel = new RolModel();
    $roles = $RolModel->findAll();

    $userModel = new UserModel();
    $users = $userModel->findAll();

    $data = [
        'users' => $users,
        'roles' => $roles
    ];

    return view('admin/AdminUser', $data);
}
    // Muestra el formulario para agregar un nuevo usuario
    public function new(): string
    {
        
        $RolModel = new RolModel();
        $data['Rol'] = $RolModel->findAll(); 

       return view('admin/AddUser', $data);

    }
    // Crea un nuevo usuario
    public function create()
    {
        // Reglas de validación para el formulario
    $rules = [
        'codigo' => 'required|min_length[3]|max_length[20]|is_unique[users.codigo]',
        'contraseña' => 'required|min_length[6]|max_length[255]',
        'role' => 'required'
    ];
    // Si la validación falla, vuelve al formulario con errores
    if (!$this->validate($rules)) {
        $RolModel = new \App\Models\RolModel();
        $data['Rol'] = $RolModel->findAll();
        $data['validation'] = $this->validator;
        return view('admin/AddUser', $data);
    }

    $userModel = new \App\Models\UserModel();
    // Prepara los datos del usuario
    $userData = [
        'codigo'      => $this->request->getPost('codigo'),
        'contraseña'  => $this->request->getPost('contraseña'),
        'id_rol'      => $this->request->getPost('role')
    ];
     // Inserta el usuario en la base de datos
    $userModel->insert($userData);
    // Redirige con mensaje de éxito
    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario creado correctamente');
}
// Muestra el formulario para editar un usuario existente
 public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('admin/AdminUser'))->with('error', 'ID de usuario no proporcionado');
        }

        // Si el usuario no existe, redirige con error

        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('admin/AdminUser'))->with('error', 'Usuario no encontrado');
        }

        $RolModel = new \App\Models\RolModel();
        $roles = $RolModel->findAll();

        $data = [
            'user' => $user,
            'roles' => $roles
        ];
         // Muestra la vista de edición
        return view('admin/EditUser', $data);
    }


    // Actualiza un usuario existente
    public function update($id = null)
    {
        // Reglas de validación para la actualización
        $rules = [
        'codigo' => "required|min_length[3]|max_length[20]|is_unique[users.codigo, id,{$id}]",
        'contraseña' => 'required|min_length[6]|max_length[255]',
        'role' => 'required'
    ];
     // Si la validación falla, vuelve al formulario con errores
   if (!$this->validate($rules)) {
    $RolModel = new \App\Models\RolModel();
    $roles = $RolModel->findAll();
    $userModel = new \App\Models\UserModel();
    $user = $userModel->find($id);

    $data = [
        'user' => $user,
        'roles' => $roles,
        'validation' => $this->validator
    ];
    return view('admin/EditUser', $data);
}

    $userModel = new \App\Models\UserModel();
    // Prepara los datos actualizados
    $userData = [
        'codigo'      => $this->request->getPost('codigo'),
        'contraseña'  => $this->request->getPost('contraseña'),
        'id_rol'      => $this->request->getPost('role')
    ];
    // Actualiza el usuario en la base de datos
    $userModel->update($id, $userData);
    // Redirige con mensaje de éxito
    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario creado correctamente');
    }

// Elimina un usuario existente
    public function delete($id = null)
{
     // Si no se proporciona ID, redirige con error
    if ($id === null) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'ID de usuario no proporcionado');
    }


    $userModel = new \App\Models\UserModel();
     
    // Si el usuario no existe, redirige con error

    if (!$userModel->find($id)) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'Usuario no encontrado');
    }

    // Si no se puede eliminar, redirige con error
    if (!$userModel->delete($id)) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'No se pudo eliminar el usuario');
    }
     // Redirige con mensaje de éxito
    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario eliminado correctamente');
}
}