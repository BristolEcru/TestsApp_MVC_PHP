<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Config\Database;
use stdClass;

class QuizModel extends Model
{
    protected $allowedFields = [
        'question_number',
        'question_text'
    ];



    public function getQuizzes()
    {
        $db = \Config\Database::connect();

        $query = $db->table('quiz')->get();

        $result = $query->getResult();

        $num_data_returned = $query->getNumRows();
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }
    public function getQuestionBank()
    {
        $db = \Config\Database::connect();

        $query = $db->table('questionbank')->get();

        $result = $query->getResult();

        $num_data_returned = $query->getNumRows();
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }


    public function getQuizMeta($quiz_id)
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT question_number FROM quiz_questions WHERE quiz_id = $quiz_id");

        $result = $query->getResult();

        $num_data_returned = $query->getNumRows();
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }
    public function getQuizName($quiz_id)
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT quiz_name FROM quiz WHERE quiz_id = $quiz_id");

        $result = $query->getRow();

        $num_data_returned = $query->getNumRows();
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }
    public function getQuizId($quiz_id)
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT quiz_id FROM quiz WHERE quiz_id = $quiz_id");

        $result = $query->getRow();

        $num_data_returned = $query->getNumRows();
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }
    public function getQuizzesByIds($quizIds)
    {
        if ($quizIds === null) {
            return "No quizzes assigned";
        }
        $query = $this->db->query("SELECT * FROM quiz WHERE quiz_id IN (" . implode(',', $quizIds) . ")");
        return $query->getResultArray();
    }


    public function getQuizQuestions($quiz_id)
    {
        $db = \Config\Database::connect();
        $que_nums_array = $this->getQuizMeta($quiz_id);
        $result = [];

        $query2 = $db->query("SELECT qq.question_number, qb.question_text FROM quiz_questions qq JOIN questionbank qb ON qq.question_number = qb.question_number WHERE qq.quiz_id = $quiz_id");

        $result2 = $query2->getResult();
        foreach ($result2 as $row) {
            $question = new stdClass();

            $question->question_number = $row->question_number;
            $question->question_text = $row->question_text;
            $result[] = $question;
        }

        $num_data_returned = count($que_nums_array);
        if ($num_data_returned < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }


    public function getChoicesToQuiz($quiz_id)
    {
        $db = \Config\Database::connect();
        $quizmeta = $this->getQuizMeta($quiz_id);
        $result = [];

        $query = $db->query("SELECT qq.question_number, qb.choice_text, qb.choice_is_correct, qb.choice_id FROM quiz_questions qq JOIN choicesbank qb ON qq.question_number = qb.choice_question_number WHERE qq.quiz_id = $quiz_id");

        $result2 = $query->getResult();
        foreach ($result2 as $row) {
            $choice = new stdClass();
            $choice->question_number = $row->question_number;
            $choice->choice_id = $row->choice_id;
            $choice->choice_text = $row->choice_text;
            $choice->choice_is_correct = $row->choice_is_correct;


            $result[] = $choice;
        }

        $quizmeta = count($quizmeta);
        if ($quizmeta < 1) {
            echo "There is no data in the database";
        } else {
            return $result;
        }
    }

    protected $table = 'questionbank';

    public function addQuestion($questionNumber, $questionText)
    {
        $data = [
            'question_number' => $questionNumber,
            'question_text' => $questionText
        ];
        $this->insert($data);
        return $this->insertID();
    }

    public function addChoice($questionNumber, $isCorrect, $choiceText)
    {
        $data = [
            'choice_question_number' => $questionNumber,
            'choice_is_correct' => $isCorrect,
            'choice_text' => $choiceText
        ];
        $this->db->table('choicesbank')->insert($data);
        return $this->db->insertID();
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param mixed $table 
     * @return self
     */
    public function setTable($table): self
    {
        $this->table = $table;
        return $this;
    }
}