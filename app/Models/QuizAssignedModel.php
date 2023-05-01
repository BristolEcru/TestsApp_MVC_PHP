<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizAssignedModel extends Model
{
    protected $table = 'quiz_assigned';
    protected $allowedFields = ['quiz_assigned_id', 'quiz_assigned_class_id', 'quiz_assigned_student_id', 'quiz_assigned_quiz_id'];

    public function getClassQuiz($class_id)
    {
        // pobierz quiz przypisany do danej klasy
        return $this->where('quiz_assigned_class_id', $class_id)
            ->findAll();
    }
    public function get_quizzes_todo($student_id, $student_class)
    {
        $builder = $this->db->table('quiz_assigned');
        $builder->select('*');
        $builder->join('quiz', 'quiz.quiz_id = quiz_assigned.quiz_assigned_quiz_id');
        $builder->where('(quiz_assigned_student_id = ' . $student_id . ' OR quiz_assigned_class_id = ' . $student_class . ')');

        $builder->whereNotIn('quiz_assigned.quiz_assigned_id', function ($subquery) use ($student_id) {
            $subquery->select('quiz_assigned_id');
            $subquery->from('results');
            $subquery->where('student_id', $student_id);
        });
        $quizzes = $builder->get()->getResult();


        return $quizzes;
    }


    public function getStudentQuiz($student_id)
    {
        // pobierz quiz przypisany do danego ucznia
        return $this->where('quiz_assigned_student_id', $student_id)
            ->findAll();
    }
    public function checkIfAssigned($class_id, $quiz_id)
    {
        $builder = $this->db->table('quiz_assigned');
        $builder->select('quiz_assigned_id');
        $builder->where('quiz_assigned_class_id', $class_id);
        $builder->where('quiz_assigned_quiz_id', $quiz_id);

        $query = $builder->get();

        return $query->getRow() !== null;
    }

    public function assignQuizToClassModel($class_id, $quiz_id)
    {
        // przypisz quiz do klasy
        $data = [
            'quiz_assigned_class_id' => $class_id,
            'quiz_assigned_quiz_id' => $quiz_id
        ];

        $this->insert($data);
    }

    public function assignQuizToStudent($student_id, $quiz_id)
    {
        // przypisz quiz do ucznia
        $data = [
            'quiz_assigned_student_id' => $student_id,
            'quiz_assigned_quiz_id' => $quiz_id
        ];

        $this->insert($data);
    }
    public function isQuizAssignedToClass($class_id, $quiz_id)
    {
        $quizAssigned = $this->db->table('quiz_assigned')
            ->where('quiz_assigned_class_id', $class_id)
            ->where('quiz_assigned_quiz_id', $quiz_id)
            ->get()->getRow();

        if ($quizAssigned) {
            return true;
        } else {
            return false;
        }
    }

}