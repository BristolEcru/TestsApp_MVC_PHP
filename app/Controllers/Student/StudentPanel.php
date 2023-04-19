<?php

namespace App\Controllers\Student;

use App\Models\UserModel;

class StudentPanel extends BaseController
{
    public function index()
    {
        return view('studentpanel');
    }
}