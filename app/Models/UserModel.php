<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getUsersByClassId($class_id)
    {
        return $this->where('student_class_id', $class_id)->findAll();
    }




    public function getStudentsStatistics()
    {
        $builder = $this->db->table('quiz_assigned');
        $builder->select('quiz_assigned.*, quiz.quiz_name, results.points, results.max_points, users.name as student_name');
        $builder->join('quiz', 'quiz_assigned.quiz_assigned_quiz_id = quiz.quiz_id', 'left');
        $builder->join('results', 'quiz_assigned.quiz_assigned_id = results.assignment_id', 'left');
        $builder->join('users', 'quiz_assigned.quiz_assigned_student_id = users.id', 'left');
        $builder->orderBy('quiz_assigned.quiz_assigned_id', 'ASC');
        $query = $builder->get();
        $result = $query->getResultArray();

        return $result;
    }



    public function getStudentsGroupedByName()
    {
        $builder = $this->db->table('users');
        $builder->select('users.*, classes.class_name, quiz.quiz_name, quiz_assigned.*, users.id as user_id');
        $builder->join('classes', 'users.student_class_id = classes.class_id', 'left');
        $builder->join('quiz_assigned', 'quiz_assigned.quiz_assigned_student_id = users.id OR quiz_assigned.quiz_assigned_class_id = users.student_class_id', 'left');
        $builder->join('quiz', 'quiz_assigned.quiz_assigned_quiz_id = quiz.quiz_id', 'left');
        $builder->join('results', 'quiz.quiz_id = results.assignment_id AND quiz_assigned.quiz_assigned_student_id = results.student_id', 'left');

        $builder->where('users.user_type_id', 1);
        $builder->orderBy('users.name', 'ASC');
        $query = $builder->get();

        $students = array();
        foreach ($query->getResult() as $row) {
            $name = $row->name;
            $user_id = $row->user_id;
            if (!isset($students[$name])) {
                $students[$name] = array(
                    'class_name' => $row->class_name,
                    'individual_quizzes' => array(),
                    'class_quizzes' => array(),
                    'user_id' => $user_id
                );
            }
            if ($row->quiz_assigned_class_id !== null) {
                $class_name = $row->class_name;
                if (!isset($students[$name]['class_quizzes'][$class_name])) {
                    $students[$name]['class_quizzes'][$class_name] = array(
                        'class_name' => $class_name,
                        'quiz_names' => array()
                    );
                }
                if ($row->quiz_name !== null) {
                    $students[$name]['class_quizzes'][$class_name]['quiz_names'][] = $row->quiz_name;
                }
            } else {
                if ($row->quiz_name !== null) {
                    $students[$name]['individual_quizzes'][] = $row->quiz_name;
                }
            }
        }

        return $students;
    }

    private function getQuizPoints($quiz_name, $assignment_id)
    {
        $builder = $this->db->table('results');
        $builder->select('points');
        $builder->where('quiz_name', $quiz_name);
        $builder->where('assignment_id', $assignment_id);
        $query = $builder->get();
        $result = $query->getRow();
        if ($result !== null) {
            return $result->points;
        } else {
            return '-';
        }
    }

    private function ggetQuizPoints($quiz_name, $user_id, $quiz_assigned_id, $results)
    {
        $points = null;
        foreach ($results as $result) {
            if ($result->quiz_name == $quiz_name && $result->student_id == $user_id && $result->assignment_id == $quiz_assigned_id) {
                $points = $result->points;
                break;
            }
        }
        return $points;
    }

    public function deleteStudent($id)
    {

        $this->db->table('users')
            ->where('id', $id)
            ->delete();
    }

    public function removeStudentFromClass($id)
    {
        $this->db->table('users')
            ->where('id', $id)
            ->update(['student_class_id' => null]);
    }


    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['email', 'password', 'name'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}