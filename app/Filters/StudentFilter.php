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
        $userType = $session->get('user_type_id');


        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($userType !== 1) { // Jeśli zalogowany użytkownik nie jest studentem
            return redirect()->to('/'); // przekieruj na stronę główną lub gdziekolwiek indziej
        }

        return; // W przeciwnym wypadku nie rób nic i pozwól przejść dalej
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Metoda after zostaje wywołana po zakończeniu akcji kontrolera
    }
}