<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Controllers\Teacher as Manage;

class TeacherPanel extends BaseController
{

    public function index($userName)
    {
        $data['user_name'] = $userName;

        return view('teacherpanel', $data);
    }
}