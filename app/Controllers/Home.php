<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function showpostarray()
    {
        echo '<pre>';
        print_r($_POST);
        echo '<pre>';

    }
}