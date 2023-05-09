<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\QuizAssignedModel;
use App\Models\MyResultsModel;


class MyQuizzes extends BaseController
{

    public function index($user_id)
    {

        $userModel = new UserModel();
        $student_name = $userModel->getUserById($user_id)['name'];
        $student_class_id = $userModel->getUserById($user_id)['student_class_id'];
        $quizassignedmodel = new QuizAssignedModel();
        $quizzestodo = $quizassignedmodel->get_quizzes_todo($user_id, $student_class_id);

        $data['quizzes'] = $quizzestodo;
        $data['student_name'] = $student_name;


        return view('myquizzes', $data);

    }
}