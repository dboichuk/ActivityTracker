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
$f3->route('GET /', function() {

    $view = new Template();
    echo $view->render('views/profile.html');

});


//run
$f3->run();