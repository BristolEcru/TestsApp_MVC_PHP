<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\ChoiceModel;
use App\Models\QuizModel;
use App\Models\QuizQuestionModel;
use Config\Services;
use SebastianBergmann\Type\Exception;

class QuizzesToLoad extends BaseController
{
    protected $quizmodel;

    public function __construct()
    {
        $this->quizmodel = new QuizModel();
    }

    public function quizzestoload()
    {
        $data['quizzes'] = $this->quizmodel->getQuizzes();
        return view('quizzesToChose', $data);
    }

    public function quiztoload($quiz_id)
    {
        $data['quiz'] = $this->quizmodel->getQuizQuestions($quiz_id);
        $data['choices'] = $this->quizmodel->getChoicesToQuiz($quiz_id);
        $data['quizname'] = $this->quizmodel->getQuizName($quiz_id);
        $data['quiz_id'] = $this->quizmodel->getQuizId($quiz_id);

        return view('play_quiz', $data);
    }
    public function questionbank()
    {
        $data['questions'] = $this->quizmodel->getQuestionBank();
        return view('questionbank', $data);
    }
    public function checkresult()
    {
        $quiz_id = $this->request->getPost('quiz_id');

        $quiz = $this->quizmodel->getQuizQuestions($quiz_id);
        $choices = $this->quizmodel->getChoicesToQuiz($quiz_id);
        $quizname = $this->quizmodel->getQuizName($quiz_id);

        $results = array();
        foreach ($quiz as $question) {
            $question_number = $question->question_number;
            $ids = $this->request->getPost('question' . $question_number);
            $iscorrs = $this->request->getPost('choice' . $question_number);
            // $results[$question_number] = array_push($ids, $iscorrs); //id , iscorrect
            $results[$question_number] = $this->request->getPost('question' . $question_number);
        }

        $data['quiz'] = $quiz;
        $data['choices'] = $choices;
        $data['quizname'] = $quizname;
        $data['result'] = $results;

        return view('quiz_result', $data);

    }

    public function deleteQuestion($questionNumber)
    {
        $model = new QuizModel();
        $choicemodel = new ChoiceModel();
        // Delete the choices for the question from the choicesbank table
        $choicemodel->table('choicesbank')->where('choice_question_number', $questionNumber)->delete();
        // Delete the question from the questionbank table
        $model->table('questionbank')->where('question_number', $questionNumber)->delete();

        return redirect()->route('questionbank');

    }

    public function addQuestion()
    {
        $model = new QuizModel();
        $choicemodel = new ChoiceModel();
        $maxQuestionNumber = $model->query('SELECT MAX(question_number) as max_question_number FROM questionbank')->getResult()[0]->max_question_number;
        $questionNumber = $maxQuestionNumber + 1;
        $choices = [];
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