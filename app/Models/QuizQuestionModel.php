<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizQuestionModel extends Model
{
    protected $table = 'quiz_questions';
    protected $allowedFields = ['question_number', 'quiz_id'];

}