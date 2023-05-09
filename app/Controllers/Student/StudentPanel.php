<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;

class StudentPanel extends BaseController
{
    public function index($userId)
    {
        $user = new UserModel();
        $userName = $user->getUserById($userId)['name'];

        $data['user_id'] = $userId;
        $data['user_name'] = $userName;


        return view('studentpanel', $data);
    }
}