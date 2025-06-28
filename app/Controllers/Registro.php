<?php

namespace App\Controllers;

use App\Models\UserModel;

class Registro extends BaseController
{

    public function __construct()
    {
        helper('url');
    }



    public function index(): string
    {

       
        return view('registro');

    }
    public function registroUsuario()
    {
       $codigo =$this->request->getPost('codigo');
        $password = $this->request->getPost('password');
        $password2 = $this->request->getPost('password2');

        /*if ($password !== $password2) {
            session()->setFlashdata('msg', 'Las contraseñas no coinciden.');
            return redirect()->to('/registro');
        }

        $userModel = new UserModel();
        $data = [
            'user' => $codigo,
            'contraseña' => $password,
            'id_rol' => 2 // Asignar rol de usuario
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('msg', 'Usuario registrado exitosamente.');
            return redirect()->to('/login');
        } else {
            session()->setFlashdata('msg', 'Error al registrar el usuario.');
            return redirect()->to('/registro');
        }*/

        var_dump($codigo, $password, $password2);
    }
}