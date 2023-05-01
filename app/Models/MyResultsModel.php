<?php
namespace App\Models;

use App\Models\QuizAssignedModel;
use App\Models\MyResultsModel;

use CodeIgniter\Model;

class MyResults extends Model
{
    protected $table = 'results';

    protected $allowedFields = ['student_id', 'quiz_assigned_id', 'points', 'max_points', 'quiz_name'];



    public function add_result($student_id, $quiz_assigned_id, $points, $max_points, $quiz_name)
    {
        $data = [
            'student_id' => $student_id,
            'quiz_assigned_id' => $quiz_assigned_id,
            'points' => $points,
            'max_points' => $max_points,
            'quiz_name' => $quiz_name
        ];

        $this->db->table('results')->insert($data);
    }
}