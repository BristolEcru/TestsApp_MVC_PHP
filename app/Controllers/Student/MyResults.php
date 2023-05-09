<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MyResultsModel;


class MyResults extends BaseController
{
    public function index($user_id)
    {

        $resultModel = new MyResultsModel();

        $lastResults['lastResults'] = $resultModel->getLastResults($user_id);

        return view('myresults', $lastResults);
    }

}