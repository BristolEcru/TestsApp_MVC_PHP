<?php

namespace App\Controllers\Teacher;

use App\Controllers\BaseController;
use App\Models\ClassModel;
use App\Models\UserModel;

use App\Models\QuizModel;
use CodeIgniter\Controller;



class Students extends Controller
{
    public function index()
    {

        $userModel = new UserModel();

        $data['students'] = $userModel->getStudentsGroupedByName();
        return view('manage\students', $data);
    }
    public function viewStatistics()
    {
        $userModel = new UserModel();

        $data['statistics'] = $userModel->getStudentsStatistics();

        return view('manage\statistics', $data);
    }

    public function deletestudent()
    {
        $userModel = new UserModel();
        $studentid = $this->request->getPost('user_id');
        $userModel->deleteStudent($studentid);
        return redirect()->to(route_to('students'));
    }
    public function removestudentfromclass()
    {
        $userModel = new UserModel();
        $studentid = $this->request->getPost('user_id');
        $userModel->removeStudentFromClass($studentid);
        return redirect()->to(route_to('students'));
    }

    public function editstudent()
    {
        $userModel = new UserModel();
        $classModel = new ClassModel();

        $user_id = trim($this->request->getVar('user_id'));

        $data['user_id'] = $user_id;
        $data['user_data'] = $userModel->getUserById($user_id);
        $data['class_data'] = $classModel->getClassById($data['user_data']['student_class_id']);
        return view('/studentactions', $data);
    }

}