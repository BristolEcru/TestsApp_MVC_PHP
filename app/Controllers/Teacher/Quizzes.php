<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;

use App\Models\ChoiceModel;
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
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';

        return view('manage\quiz\add_question');
    }

    public function showpostarray()
    {
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';

    }
    public function createquiz()
    {
        $quizName = $this->request->getPost('quiz_name');
        $selectedQuestions = $this->request->getPost('selected_questions[]');
        var_dump($quizName);

        $quizModel = new QuizNameModel();
        $quizQuestionModel = new QuizQuestionModel();

        // Insert quiz name into quiz table
        $quizData = ['quiz_name' => $quizName];

        $quizModel->insert($quizData);
        $quizId = $quizModel->insertID();

        // Insert selected questions into quiz_questions table
        foreach ($selectedQuestions as $questionNr) {
            $quizQuestionData = ['quiz_id' => $quizId, 'question_number' => $questionNr];
            $quizQuestionModel->insert($quizQuestionData);
        }

        // Redirect to a success page or back to the form
        return redirect()->route('quizzes')->with('success', 'Quiz created successfully.');
    }
    public function addQuestion()
    {
        $model = new QuizModel();
        $choicemodel = new ChoiceModel();
        $maxQuestionNumber = $model->query('SELECT MAX(question_number) as max_question_number FROM questionbank')->getResult()[0]->max_question_number;
        $questionNumber = $maxQuestionNumber + 1;

        if ($this->request->getPost()) {
            // Add the new question to the questionbank table
            $questionData = [
                'question_number' => $questionNumber,
                'question_text' => $this->request->getPost('question_text')
            ];
            $model->table('questionbank')->insert($questionData);

            // Add the choices for the new question to the choicesbank table
            $choiceData = [];
            foreach ($this->request->getPost('choice_text') as $key => $choice_text) {
                $isCorrect = $this->request->getPost('correct_choice') == $key ? 1 : 0;

                $choiceData = [
                    'choice_question_number' => $questionNumber,
                    'choice_text' => $choice_text,
                    'choice_is_correct' => $isCorrect
                ];
                $choicemodel->table('choicesbank')->insert($choiceData);
            }

            return view('manage/quiz/add_question');
        }

        return view('manage/quiz/add_question');
    }
}