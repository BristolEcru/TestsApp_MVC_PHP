<?php
namespace App\Models;


use CodeIgniter\Model;

class MyResultsModel extends Model
{
    protected $table = 'results';

    protected $allowedFields = ['student_id', 'quiz_assigned_id', 'points', 'max_points', 'quiz_name'];



    public function add_result($student_id, $quiz_assigned_id, $points, $max_points, $quiz_name)
    {
        $data = [
            'student_id' => $student_id,
            'assignment_id' => $quiz_assigned_id,
            'points' => $points,
            'max_points' => $max_points,
            'quiz_name' => $quiz_name
        ];

        $this->db->table('results')->insert($data);
    }


    public function calculateCorrectAnswers($quiz, $choices, $quiz_assigned_id, $result, $student_id, $quiz_name)
    {

        $correctAnswers = 0;
        $max_points = count($quiz);

        foreach ($quiz as $que) {
            $isQuestionCorrect = true;

            foreach ($choices as $choice) {
                if ($choice->question_number == $que->question_number && $choice->choice_is_correct == 1) {
                    if (!isset($result[$que->question_number]) || $result[$que->question_number] != $choice->choice_id) {
                        $isQuestionCorrect = false;
                        break;
                    }
                }
            }

            if ($isQuestionCorrect) {
                $correctAnswers++;
            }
        }

        $points = $correctAnswers;
        $data = [
            'student_id' => $student_id,
            'assignment_id' => $quiz_assigned_id,
            'points' => $points,
            'max_points' => $max_points,
            'quiz_name' => $quiz_name
        ];

        $this->add_result($student_id, $quiz_assigned_id, $points, $max_points, $quiz_name);

        return $correctAnswers;
    }

    public function getLastResults($student_id)
    {

        return $this->select('quiz_name, points, max_points')
            ->where('student_id', $student_id)
            ->limit(5)
            ->get()
            ->getResultArray();
    }


}