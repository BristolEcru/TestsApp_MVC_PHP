<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;

class MyResults extends BaseController
{
    public function index($student_id)
    {
        echo ' <h1> myquizzes' . $student_id . '</h1>';
    }
}