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
            // Reglas de validación para los campos
            $rules = [
                'codigo' => 'required',
                'password' => 'required'
            ];

            // Si la validación falla, se retorna al formulario
            if (!$this->validate($rules)) {
                return view('autenticacion/login', ['validacion' => $this->validator]);
            }

            // Obtener los datos de usuario
            $userModel = new UserModel();
            $userPost = $this->request->getPost('codigo');
            $passwordPost = $this->request->getPost('password');

            // Buscar al usuario por código
            $user = $userModel->where('codigo', $userPost)->first();  // Cambia 'codigo' por el campo que usas para identificar al usuario

            // Verificar si el usuario existe y si la contraseña es correcta
            if ($user && $user['contraseña'] == $passwordPost) {  // Compara la contraseña ingresada con la que está en la base de datos
                // Iniciar sesión si la contraseña es correcta
                $session = session();
                $ses_data = [
                    'id' => $user['id'],
                    'user' => $user['codigo'],  // Usar el valor del código o el nombre de usuario
                    'rol' => $user['id_rol'],
                    'LoggedIn' => true
                ];
                $session->set($ses_data);

                // Redirigir a la página correspondiente dependiendo del rol
                if ($user['id_rol'] === 'administrador') {
                    return redirect()->to('/admin/dashboard');  // Cambia la URL del administrador si es necesario
                } else {
                    return redirect()->to('/user/indexusuario');  // Redirigir al área de usuario normal
                }
            } else {
                // Si las credenciales no son correctas
                $session = session();
                $session->setFlashdata('msg', 'Password incorrecto.');
                return redirect()->to('/login');
            }
        }

        // Mostrar el formulario de login si la petición no es POST
        return view('login');
    }

    // Método de logout
public function logout()
{
    session()->destroy();  // Esto destruye toda la sesión
    return redirect()->to('/login');  // Redirige a la página de login
}

}
