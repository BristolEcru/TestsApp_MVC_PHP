<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $primaryKey = 'class_id';
    protected $allowedFields = ['class_name'];
    protected $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel();
    }
    public function getUsersByClassId($class_id)
    {
        $query = $this->userModel->select('*')
            ->where('student_class_id', $class_id)
            ->findAll();
        return $query;
    }

    public function getClasses()
    {
        $builder = $this->db->table('classes');
        $builder->orderBy('class_name', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getClassById($id)
    {
        return $this->find($id);
    }

    public function updateClass($id, $data)
    {
        $this->set($data)
            ->where('class_id', $id)
            ->update();
    }

    public function createClass($className)
    {
        $data = [
            'class_name' => $className,
        ];
        $this->insert($data);
        return $this->getInsertID();
    }
    public function getClassByName($className)
    {
        $class = $this->where('class_name', $className)->first();
        return $class;
    }
    public function getClassesWithQuizzes()
    {
        $builder = $this->db->table('classes');
        $builder->select('classes.*, quiz.quiz_name');
        $builder->join('quiz_assigned', 'quiz_assigned.quiz_assigned_class_id = classes.class_id');
        $builder->join('quiz', 'quiz.quiz_id = quiz_assigned.quiz_assigned_quiz_id');
        $builder->groupBy('classes.class_id');
        $query = $builder->get();

        return $query->getResultArray();
    }
    public function getClassesWithQuizzesAndStudents()
    {
        $builder = $this->db->table('classes');
        $builder->from('classes c');
        $builder->select('c.class_id, c.class_name, q.quiz_id, q.quiz_name, u.name');
        $builder->join('quiz_assigned qa', 'qa.quiz_assigned_class_id = c.class_id');
        $builder->join('quiz q', 'q.quiz_id = qa.quiz_assigned_quiz_id');
        $builder->join('users u', 'u.student_class_id = c.class_id');

        $builder->orderBy('classes.class_name', 'ASC');
        $query = $builder->get();

        $result = [];
        foreach ($query->getResultArray() as $row) {
            $class_id = $row['class_id'];
            $result[$class_id]['class_name'] = $row['class_name'];
            $result[$class_id]['quizzes'][$row['quiz_id']] = $row['quiz_name'];
            $result[$class_id]['students'][$row['name']] = $row['name'];
        }

        // Pobierz wszystkie quizy
        $builder = $this->db->table('quiz');
        $query = $builder->get();
        $available_quizzes = $query->getResultArray();

        return [
            'classes' => $result,
            'quizzes' => $available_quizzes,
        ];
    }

    public function getUnassignedQuizzes()
    {
        $builder = $this->db->table('classes');
        $builder->select('class_id, class_name');

        $classes = $builder->get()->getResultArray();

        $unassigned_quizzes = [];
        foreach ($classes as $class) {
            $class_id = $class['class_id'];

            $builder = $this->db->table('quiz');
            $builder->select('quiz_id, quiz_name');
            $builder->whereNotIn('quiz_id', function ($builder) use ($class_id) {
                $builder->select('quiz_assigned_quiz_id');
                $builder->from('quiz_assigned');
                $builder->where('quiz_assigned_class_id', $class_id);
            });

            $query = $builder->get();

            $quizzes = $query->getResultArray();
            $unassigned_quizzes[$class['class_name']] = $quizzes;
        }

        return $unassigned_quizzes;
    }




    public function getClassesWithUsers()
    {
        $classData = $this->findAll();

        foreach ($classData as &$class) {
            $class['users'] = $this->userModel->getUsersByClassId($class['class_id']);
        }

        return $classData;
    }

    public function withQuizzes()
    {
        $classes = $this->findAll();
        foreach ($classes as &$class) {
            $quizzes = $this->db->table('quiz_assigned')
                ->select('quiz.quiz_name')
                ->join('quiz', 'quiz_assigned.quiz_assigned_quiz_id = quiz.quiz_id')
                ->where('quiz_assigned_class_id', $class['class_id'])
                ->get()
                ->getResultArray();
            $class['quizzes'] = $quizzes;
        }
        return $classes;
    }
    public function getClassesData()
    {
        $builder = $this->db->table('classes');
        $builder->select('classes.*, quiz.quiz_name, users.name');
        $builder->join('quiz_assigned', 'quiz_assigned.quiz_assigned_class_id = classes.class_id', 'left');
        $builder->join('quiz', 'quiz.quiz_id = quiz_assigned.quiz_assigned_quiz_id', 'left');
        $builder->join('users', 'users.student_class_id = classes.class_id', 'left');
        $builder->groupBy('classes.class_id, quiz.quiz_id, users.id');
        $query = $builder->get();

        $classData = [];
        foreach ($query->getResultArray() as $row) {
            if (!isset($classData[$row['class_id']])) {
                $classData[$row['class_id']] = [
                    'class_id' => $row['class_id'],
                    'class_name' => $row['class_name'],
                    'quiz_name' => '',
                    'users' => [],
                ];
            }

            if (!empty($row['quiz_name']) && empty($classData[$row['class_id']]['quiz_name'])) {
                $classData[$row['class_id']]['quiz_name'] = $row['quiz_name'];
            }

            if (!empty($row['name'])) {
                $classData[$row['class_id']]['users'][] = $row['name'];
            }
        }

        return array_values($classData);
    }


}