<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }


    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();


        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        $pwd_verify = password_verify($password, $user['password']);

        if (!$pwd_verify) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        // Pobierz user_type_id użytkownika
        $userType = $user['user_type_id'];
        $userName = $user['name'];
        $userId = $user['id'];
        $session->set('id', $userId);
        $session->set('navbar_user_id', $userId);

        if ($userType == 0) {
            // przekieruj do panelu administratora
            return redirect()->to('/teacher/teacherpanel/' . $userName);
        } elseif ($userType == 1) {
            // przekieruj do panelu studenta
            return redirect()->to('/student/studentpanel/' . $userId);

        }
    }


    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }
}