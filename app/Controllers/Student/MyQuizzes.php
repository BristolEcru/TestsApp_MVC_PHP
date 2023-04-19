<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;

class MyQuizzes extends BaseController
{
    public function index($type)
    {
        echo ' <h1>myquizzes' . $type . '</h>';
    }
}