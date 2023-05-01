<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;
use App\Models\ClassModel;
use App\Models\UserModel;

use App\Models\QuizModel;
use CodeIgniter\Controller;



class Students extends Controller
{
    public function index()
    {

        $userModel = new UserModel();

        $data['students'] = $userModel->getStudentsGroupedByClass();
        return view('manage\students', $data);
    }



}