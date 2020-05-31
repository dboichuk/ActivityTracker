<?php

//Start a session
session_start();

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

    //Clear SESSION variable
    $_SESSION = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database= new Database();
        if(isset($_POST['login'])){
            $result=$database->checkLogin($_POST['email'],$_POST['password']);
            if($result==0){
                $f3->set('error','You entered invalid credentials!');
            }
            if($result==1){
                $_SESSION['loggedIn']=true;
                $_SESSION['email'] = $_POST['email'];
                $f3->reroute("profile");

            }

        }
        if(isset($_POST['register'])){
            $f3->reroute("register");
        }
    }



    $view = new Template();
    echo $view->render('views/login.html');

});

$f3->route('GET|POST /profile', function($f3) {
    $database= new Database();
    $row = $database->getUser($_SESSION['email']);

    $_SESSION['fName'] = $row['firstName'];
    $_SESSION['lName'] = $row['lastName'];
    $_SESSION['age'] = $row['age'];
    $_SESSION['fitnessLevel'] = $row['fitnessLevel'];
    $_SESSION['password'] = $row['password'];

    $view = new Template();
    echo $view->render('views/profile.html');

});


$f3->route('GET|POST /register', function($f3) {

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

        $_SESSION['fName'] = $fname;
        $_SESSION['lName'] = $lname;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['fitnessLevel'] = $fitnessLevel;

        $f3->reroute("profile");
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