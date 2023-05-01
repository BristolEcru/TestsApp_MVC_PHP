<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;

use App\Models\ClassModel;
use App\Models\QuizNameModel;

use App\Models\QuizModel;
use App\Models\QuizQuestionModel;


use CodeIgniter\Controller;



class Quizzes extends Controller
{
    public function index()
    {

        $quizmodel = new QuizModel();
        $data['quizzes'] = $quizmodel->getQuizzes();
        return view('manage\quizzes', $data);
    }
    public function questionbank()
    {

        $quizmodel = new QuizModel();
        $data['questions'] = $quizmodel->getQuestionBank();
        return view('manage\questionbank', $data);
    }
    public function addnewquestions()
    {
        return view('manage\quiz\add_question');
    }


    public function createQuiz()
    {
        $quizName = $this->request->getPost('quiz_name');
        $selectedQuestions = $this->request->getPost('selected_questions[]');


        $quizModel = new QuizNameModel();
        $quizQuestionModel = new QuizQuestionModel();

        // Insert quiz name into quiz table
        $quizData = ['quiz_name' => $quizName];
        var_dump($quizData);
        $quizModel->insert($quizData);
        $quizId = $quizModel->insertID();

        var_dump($quizId);


        // Insert selected questions into quiz_questions table
        foreach ($selectedQuestions as $questionNr) {
            $quizQuestionData = ['quiz_id' => $quizId, 'question_number' => $questionNr];
            $quizQuestionModel->insert($quizQuestionData);
        }

        // Redirect to a success page or back to the form
        return redirect()->route('quizzes')->with('success', 'Quiz created successfully.');
    }

}