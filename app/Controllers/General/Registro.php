<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Registro extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index(): string
    {
        return view('registro');
    }

    public function registroUsuario()
    {
        $rules = [
            'codigo'    => 'required|max_length[30]',
            'password'  => 'required|max_length[255]|min_length[8]',
            'password2' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return view('registro', [
                'validation' => $this->validator
            ]);
        }

        $userModel = new UserModel();

        $data = [
            'codigo'      => $this->request->getPost('codigo'),
            'contraseña'=> $this->request->getPost('password'),
            'id_rol'    => 2 // Rol estudiante
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('msg', 'Usuario registrado exitosamente.');
            return redirect()->to('/login');
         } else {
                session()->setFlashdata('msg', 'Error al registrar el usuario: ' . implode(' ', $userModel->errors()));
                return redirect()->to('/registro');
            }
       
    }
}