<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TeacherFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        $session = session();
        $userType = $session->get('user_type_id');

        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($userType !== 0) { // Jeśli zalogowany użytkownik nie jest nauczycielem

            return redirect()->to('/'); // przekieruj na stronę główną lub gdziekolwiek indziej
        }

        return; // W przeciwnym wypadku nie rób nic i pozwól przejść dalej
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Metoda after zostaje wywołana po zakończeniu akcji kontrolera
    }
}