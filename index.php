<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once("vendor/autoload.php");


//Instantiate the F3 Base class
$f3 = Base::instance();



//Default route
$f3->route('GET|POST /', function($f3) {
    $username="jshmo";
    $password='1111';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['login'])){
            $f3->reroute("profile");
        }
        if(isset($_POST['register'])){
            $f3->reroute("register");
        }
    }



    $view = new Template();
    echo $view->render('views/login.html');

});

$f3->route('GET|POST /profile', function($f3) {




    $view = new Template();
    echo $view->render('views/profile.html');

});

$f3->route('GET|POST /register', function($f3) {




    $view = new Template();
    echo $view->render('views/register.html');

});


//run
$f3->run();