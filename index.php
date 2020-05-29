<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");
require_once("model/Database.php");




//Instantiate the F3 Base class
$f3 = Base::instance();




//Default route
$f3->route('GET|POST /', function($f3) {
    $username="jshmo";
    $password='1111';
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['login'])){
            $f3->reroute("profile");
            $_SESSION['loggedIn']=true;
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


$f3->route('GET|POST /register', function($f3,$database) {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database= new Database();

        $f3->set('registered','Thank you for registration!');

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $fitnessLevel=$_POST['level'];
        $database->addUser($fname, $lname, $password,$email,$age,$gender,$fitnessLevel);


    }



    $view = new Template();
    echo $view->render('views/register.html');

});


$f3->route('GET|POST /hike', function($f3) {

    $view = new Template();
    echo $view->render('views/hike.html');
});

$f3->route('GET|POST /fishing', function($f3) {

    $f3->set('waters', getWaterTypes());

    $view = new Template();
    echo $view->render('views/fishing.html');
});


//run
$f3->run();