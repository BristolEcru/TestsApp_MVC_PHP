<?php

namespace App\Controllers;

use App\Models\UserModel;

class TeacherPanel extends BaseController
{
    public function index()
    {
        return view('teacherpanel');
    }
}