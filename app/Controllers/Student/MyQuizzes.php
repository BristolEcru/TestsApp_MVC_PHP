<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\QuizAssignedModel;



class MyQuizzes extends BaseController
{

    public function index($student_id)
    {
        $userModel = new UserModel();
        $student_name = $userModel->getUserById($student_id)['name'];
        $student_class = $userModel->getUserById($student_id)['student_class_id'];
        $quizassignedmodel = new QuizAssignedModel();
        $quizzestodo = $quizassignedmodel->get_quizzes_todo($student_id, $student_class);

        $data['quizzes'] = $quizzestodo;
        $data['student_name'] = $student_name;

        return view('/quizzestochose', $data);

    }
}