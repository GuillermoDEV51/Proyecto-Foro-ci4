<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class UserLogoutController extends BaseController
{
    public function logout()
    {
        session()->destroy();  // Destruir la sesión

        return redirect()->to(base_url('login'));  // Redirigir a la página de login
    }
}
