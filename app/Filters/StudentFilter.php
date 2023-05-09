<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class StudentFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $user_id = $session->get('id');

        if (!$user_id) {
            return redirect()->to('/login');
        }

        return; // W przeciwnym wypadku nie rób nic i pozwól przejść dalej
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Metoda after zostaje wywołana po zakończeniu akcji kontrolera
    }
    public function getStudentIdCell(RequestInterface $request)
    {
        $session = session();
        $user_id = $session->get('id');

        $session->set('id', $user_id);
        return [
            'user_id' => $user_id,
        ];
    }

}