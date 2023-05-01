<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;
use App\Models\ClassModel;
use App\Models\UserModel;
use App\Models\QuizModel;
use App\Models\QuizAssignedModel;
use CodeIgniter\Controller;

class Classes extends Controller
{
    public function index()
    {
        $classModel = new ClassModel();
        $data['classes'] = $classModel->getClassesWithQuizzesAndStudents();

        return view('manage/classes', $data);

    }


    public function store()
    {
        helper(['form', 'url']);

        $rules = [
            'class_name' => 'required|min_length[1]|max_length[255]',
        ];

        if ($this->validate($rules)) {
            $classModel = new ClassModel();
            $classData = [
                'class_name' => $this->request->getVar('class_name'),
            ];
            $classModel->save($classData);

            return redirect()->to('/classes');
        } else {
            $data['validation'] = $this->validator;
            echo view('classes/create', $data);
        }
    }
    public function editt($id)
    {
        $classModel = new ClassModel();

        if (
            !$this->validate([
                'class_name' => 'required|min_length[1]'
            ])
        ) {
            $data['validation'] = $this->validator;
            $data['class'] = $classModel->getClassById($id);
            return view('class/edit', $data);
        } else {
            $class_name = $this->request->getVar('class_name');
            $classModel->updateClass($id, ['class_name' => $class_name]);
            return redirect()->to('/class');
        }
    }
    public function edit($class_id)
    {
        // pobierz dane klasy o ID $class_id z bazy danych
        // i przekaż je do widoku
        $classModel = new ClassModel();
        $class = $classModel->find($class_id);
        $data['class'] = $class;

        return view('class\edit', $data);
    }
    public function editClass($id)
    {
        $classModel = new ClassModel();
        $class = $classModel->getClassById($id);

        if (!$class) {
            // jeśli nie ma klasy o podanym id, wyświetl błąd
            return view('error');
        }

        // pobierz listę quizów i uczniów dla klasy
        $quizModel = new QuizModel();
        $studentModel = new UserModel();
        $quizzes = $quizModel->getQuizzesByClassId($id);
        $students = $studentModel->getStudentsByClassId($id);

        // wyrenderuj widok edycji klasy i przekaż dane
        return view('edit_class', [
            'class' => $class,
            'quizzes' => $quizzes,
            'students' => $students
        ]);
    }



}