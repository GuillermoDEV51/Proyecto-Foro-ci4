<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RolModel; 

class AdminUser extends BaseController
{

    public function __construct()
    {
        helper('url');
        helper('form');
    }

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
    public function new(): string
    {
        
        $RolModel = new RolModel();
        $data['Rol'] = $RolModel->findAll(); 

       return view('admin/AddUser', $data);

    }
    public function create()
{
    $rules = [
        'codigo' => 'required|min_length[3]|max_length[20]|is_unique[users.codigo]',
        'contraseña' => 'required|min_length[6]|max_length[255]',
        'role' => 'required'
    ];

    if (!$this->validate($rules)) {
        $RolModel = new \App\Models\RolModel();
        $data['Rol'] = $RolModel->findAll();
        $data['validation'] = $this->validator;
        return view('admin/AddUser', $data);
    }

    $userModel = new \App\Models\UserModel();
    
    $userData = [
        'codigo'      => $this->request->getPost('codigo'),
        'contraseña'  => $this->request->getPost('contraseña'),
        'id_rol'      => $this->request->getPost('role')
    ];

    $userModel->insert($userData);

    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario creado correctamente');
}
 public function edit($id = null)
    {
        if ($id === null) {
            return redirect()->to(base_url('admin/AdminUser'))->with('error', 'ID de usuario no proporcionado');
        }

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

        return view('admin/EditUser', $data);
    }

    public function update($id = null)
    {

        $rules = [
        'codigo' => "required|min_length[3]|max_length[20]|is_unique[users.codigo, id,{$id}]",
        'contraseña' => 'required|min_length[6]|max_length[255]',
        'role' => 'required'
    ];

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
    
    $userData = [
        'codigo'      => $this->request->getPost('codigo'),
        'contraseña'  => $this->request->getPost('contraseña'),
        'id_rol'      => $this->request->getPost('role')
    ];

    $userModel->update($id, $userData);

    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario creado correctamente');
    }

    public function delete($id = null)
{
    if ($id === null) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'ID de usuario no proporcionado');
    }

    $userModel = new \App\Models\UserModel();

    if (!$userModel->find($id)) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'Usuario no encontrado');
    }

    if (!$userModel->delete($id)) {
        return redirect()->to(base_url('admin/AdminUser'))->with('error', 'No se pudo eliminar el usuario');
    }

    return redirect()->to(base_url('admin/AdminUser'))->with('success', 'Usuario eliminado correctamente');
}
}