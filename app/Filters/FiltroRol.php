<?php



namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FiltroRol implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('role');

        if (in_array('admin', $arguments) && $role !== 'admin') {
            return redirect()->to('/login');
        }
        if (in_array('estudiante', $arguments) && $role !== 'estudiante') {
            return redirect()->to('/login');
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after
    }
}