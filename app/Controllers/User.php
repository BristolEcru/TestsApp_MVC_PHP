<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ClassModel;
use App\Models\QuizModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user', $data);
    }
    public function students()
    {
        $studentModel = new UserModel();
        $classModel = new ClassModel();

        $students = $studentModel->getStudentsGroupedByClass();
        $classes = $classModel->getClasses();



        return view('students', [
            'students' => $students,
            'classes' => $classes,

        ]);
    }
    public function stud()
    {
        $classModel = new ClassModel();
        $classes = $classModel->getClassesWithUsers();

        $data = [];

        foreach ($classes as $class) {
            $data[$class['class_name']] = $classModel->getUsersByClassId($class['class_id']);
        }

        return view('students', ['data' => $data]);
    }
    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getVar('name'),
            'student_class_id' => $this->request->getVar('student_class_id'),
            'user_type' => $this->request->getVar('user_type'),
            'quiz_assigned_id' => $this->request->getVar('quiz_assigned_id')
        ];
        $model->save($data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->getUserById($id);
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'student_class_id' => $this->request->getVar('student_class_id'),
            'user_type' => $this->request->getVar('user_type'),
            'quiz_assigned_id' => $this->request->getVar('quiz_assigned_id')
        ];
        $model->update($id, $data);
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users');
    }


}