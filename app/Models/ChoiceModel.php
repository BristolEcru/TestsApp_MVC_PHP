<?php

namespace App\Models;

use CodeIgniter\Model;

class ChoiceModel extends Model
{
    protected $table = 'choicesbank';
    protected $allowedFields = ['choice_question_number', 'choice_text', 'choice_is_correct'];

    public function getChoicesByQuestionNumber($questionNumber)
    {
        return $this->where('choice_question_number', $questionNumber)->findAll();
    }
}