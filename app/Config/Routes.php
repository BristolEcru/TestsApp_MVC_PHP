<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('home/index', 'Home::index');



$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);

$routes->get('/login', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authenticate', ['filter' => 'guestFilter']);

$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/home', 'Home::index', ['filter' => 'authFilter']);



$routes->group('student', ['namespace' => 'App\Controllers\Student', 'filter' => 'studentFilter'], function ($routes) {
    $routes->get('studentpanel/myquizzes/(:any)', 'MyQuizzes::index/$1', ['as' => 'myquizzes']);
    $routes->get('studentpanel/myresults/(:any)', 'MyResults::index/$1', ['as' => 'myresults']);

    $routes->post('studentpanel/quiztoload/checkresult', 'QuizzesToLoad::checkresult', ['as' => 'checkresult']);

    $routes->get('studentpanel/quiztoload/(:any)/(:any)', 'QuizzesToLoad::quiztoload/$1/$2', ['as' => 'quiztoload']);
    $routes->get('studentpanel/(:any)', 'StudentPanel::index/$1');
});

$routes->group('teacher', ['namespace' => 'App\Controllers\Teacher'], function ($routes) {
    $routes->get('teacherpanel/students', 'Students::index', ['as' => 'students']);
    $routes->get('teacherpanel/statistics', 'Students::viewStatistics', ['as' => 'statistics']);

    $routes->get('teacherpanel/classes', 'Classes::index', ['as' => 'classes']);
    $routes->get('teacherpanel/createclassform', 'Classes::createclassform', ['as' => 'createclassform']);
    $routes->post('teacherpanel/addclass', 'Classes::addclass', ['as' => 'addclass']);
    $routes->post('teacherpanel/deleteclassform', 'Classes::deleteclassform', ['as' => 'deleteclassform']);
    $routes->post('teacherpanel/deleteclass', 'Classes::deleteclass', ['as' => 'deleteclass']);

    $routes->post('teacherpanel/deletestudent', 'Students::deletestudent', ['as' => 'deletestudent']);
    $routes->post('teacherpanel/editstudent', 'Students::editstudent', ['as' => 'editstudent']);
    $routes->post('teacherpanel/removestudentfromclass', 'Students::removestudentfromclass', ['as' => 'removestudentfromclass']);


    $routes->get('quizassignedcontroller/quiztoclassform', 'QuizAssignedController::quiztoclassform', ['as' => 'quiztoclassform']);
    $routes->get('quizassignedcontroller/assignquiztoclass', 'QuizAssignedController::assignquiztoclass', ['as' => 'assignquiztoclass']);

    $routes->post('quizassignedcontroller/assignquiztostudentform', 'QuizAssignedController::assignquiztostudentform', ['as' => 'assignquiztostudentform']);
    $routes->post('quizassignedcontroller/assignquiztostudent', 'QuizAssignedController::assignquiztostudent', ['as' => 'assignquiztostudent']);

    $routes->post('quizassignedcontroller/changeclassform', 'Classes::changeclassform', ['as' => 'changeclassform']);
    $routes->post('quizassignedcontroller/changeclass', 'Classes::changeclass', ['as' => 'changeclass']);

    $routes->get('teacherpanel/quizzes', 'Quizzes::index', ['as' => 'quizzes']);



    $routes->get('teacherpanel/quizzes/questionbank', 'Quizzes::questionbank', ['as' => 'questionbank']);
    $routes->post('teacherpanel/quizzes/createquiz', 'Quizzes::createquiz', ['as' => 'createquiz']);
    $routes->get('teacherpanel/quizzes/questionbank/add_new_questions', 'Quizzes::addnewquestions', ['as' => 'addnewquestions']);
    $routes->get('teacherpanel/(:any)', 'TeacherPanel::index/$1');


});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}