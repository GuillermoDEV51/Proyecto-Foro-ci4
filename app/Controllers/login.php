<?php

namespace App\Controllers;

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
        
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'codigo' => 'required',
                'password' => 'required'
            ];

            if (! $this->validate($rules)) {
                return view('autenticacion/login', ['validacion' => $this->validator]);
            }

            $userModel = new UserModel();
            
            $user = $userModel->where('codigo', $this->request->getPost('codigo'))->first();

            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                
                $session = session();
                
                $ses_data = [
                    'codigo_id'   => $user['id'],
                    'codigo'  => $user['codigo'],
                    'rol'      => $user['rol'],
                    'LoggedIn'=> true
                ];
                $session()->set($ses_data);
                if ($user['rol'] === 'administrador') {
                    return redirect()->to('');
                } else {
                    return redirect()->to('');
                }
            } else {
                return view('login', ['error' => 'Credenciales incorrectas']);
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