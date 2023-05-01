<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizNameModel extends Model
{
    protected $table = 'quiz';
    protected $allowedFields = ['quiz_name', 'quiz_id'];

}