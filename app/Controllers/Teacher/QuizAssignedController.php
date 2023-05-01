<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;


use App\Models\ClassModel;
use App\Models\QuizAssignedModel;
use CodeIgniter\API\ResponseTrait;


class QuizAssignedController extends BaseController
{
    use ResponseTrait;

    protected $quizAssignedModel;
    protected $request;

    public function __construct()
    {

        $this->quizAssignedModel = new QuizAssignedModel();
    }

    public function getClassQuiz($class_id)
    {
        // pobierz quizy przypisane do danej klasy
        $quizzes = $this->quizAssignedModel->getClassQuiz($class_id);

        return $this->respond($quizzes);
    }

    public function getStudentQuiz($student_id)
    {
        // pobierz quizy przypisane do danego ucznia
        $quizzes = $this->quizAssignedModel->getStudentQuiz($student_id);

        return $this->respond($quizzes);
    }

    public function quiztoclassform()
    {
        $classModel = new ClassModel();
        $data['classes'] = $classModel->getClassesWithQuizzesAndStudents();

        return view('\quiztoclassform', $data);
    }


    public function assignquiztoclass()
    {
        $class_id = $this->request->getVar('class_id');
        $quiz_id = $this->request->getVar('quiz_id');
        if ($this->quizAssignedModel->checkIfAssigned($class_id, $quiz_id)) {

            return redirect()->to(route_to('classes'));
        } else
            $this->quizAssignedModel->assignQuizToClassModel($class_id, $quiz_id);

        return redirect()->to(route_to('classes'));
    }



    public function assignQuizToStudent()
    {
        // przypisz quiz do ucznia
        $student_id = $this->request->getVar('student_id');
        $quiz_id = $this->request->getVar('quiz_id');

        $this->quizAssignedModel->assignQuizToStudent($student_id, $quiz_id);

        return $this->respondCreated(['message' => 'Quiz assigned to student']);
    }
}