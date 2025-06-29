<?php

namespace App\Controllers\General;

use App\Controllers\BaseController;

use App\Models\UserModel;

class login extends BaseController
{

    public function __construct()
    {
        helper('url');
    }



    public function index(): string
    {

        helper(['form']);
        return view('login');

    }

    

  public function loginAutenticacion()
    {
        
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'codigo' => 'required',
                'password' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('autenticacion/login', ['validacion' => $this->validator]);
            }

            $userModel = new UserModel();
            
            $userPost = $this->request->getPost('codigo');
            $passwordPost = $this->request->getPost('password');

            $user = $userModel->where('codigo', $userPost)->first();// cambien codigo por user

           
            //if ($user && password_verify($this->request->getPost('contraseña'), $user['contraseña'])) {
            if ($user['contraseña'] == $passwordPost) {
                
                $session = session();
                
                $ses_data = [
                    'id'   => $user['id'],
                    'user'  => $user['codigo'],// cambien codigo por user estoy probando cosas
                    'rol'      => $user['id_rol'],
                    'LoggedIn'=> true
                ];
               $session->set($ses_data);
                if ($user['id_rol'] === 'administrador') {
                    return redirect()->to('');
                } else {
                    return view('user/indexusuario');
                }

            } else {
                $session = session();
                $session->setFlashdata('msg', 'Password is incorrect.');

                return redirect()->to('/login');
            }
        }
        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}