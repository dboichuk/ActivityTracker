<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");
require_once("model/database.php");
require_once("model/validate.php");


//Start a session
session_start();

//Instantiate the F3 Base class
$f3 = Base::instance();
//Instantiate database and validation classes
$validator = new Validate($f3);
$database= new Database();



//Default route
$f3->route('GET|POST /', function($f3) {

    //Clear SESSION variable
    $_SESSION = array();

    //if user filled out login and pressed a button
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database= $GLOBALS['database'];
        //if user clicked login
        if(isset($_POST['login'])){
            $result=$database->checkLogin($_POST['email'],$_POST['password']);
            if($result==0){
                $f3->set('error','You entered invalid credentials!');
            }
            if($result==1){
                $_SESSION['loggedIn']=true;
                $_SESSION['email'] = $_POST['email'];

                $row = $GLOBALS['database']->getUser($_POST['email']);
                $_SESSION['user']=$row['user_id'];

                $fname = $row['firstName'];
                $lname = $row['lastName'];
                $age= $row['age'];
                $fitnessLevel = $row['fitnessLevel'];
                $password= $row['password'];
                $gender=$row['gender'];
                $email=$_POST['email'];

                $_SESSION['profile'] = new Profile($fname, $lname, $password, $age, $fitnessLevel, $gender, $email);

                $f3->reroute("profile");

            }

        }
        //if user clicked register
        if(isset($_POST['register'])){
            $f3->reroute("register");
        }
    }


    //load template
    $view = new Template();
    echo $view->render('views/login.html');

});

//profile page
$f3->route('GET|POST /profile', function($f3) {

    $view = new Template();
    echo $view->render('views/profile.html');

});

//register page
$f3->route('GET|POST /register', function($f3) {
    //if form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //validation for registration
        if (!$GLOBALS['validator']->validName($_POST['fname'], $_POST['lname'])) {
            $f3->set("errors['name']", "Please enter a valid name.");
        }
        $GLOBALS['validator']->validPassword($_POST['password'], $_POST['cpassword']);
        if (!$GLOBALS['validator']->validEmail($_POST['email'])) {
            $f3->set("errors['email']", "Please enter a valid email.");
        }
        if (!$GLOBALS['validator']->validAge($_POST['age'])) {
            $f3->set("errors['age']", "Please enter a valid age.");
        }

        //if there are no errors, add user and go to profile page
        if (empty($f3['errors'])) {

            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $age=$_POST['age'];


            $gender=$_POST['gender'];
            $fitnessLevel=$_POST['level'];

            //user object for profile page
            $profileObj = new Profile($fname, $lname, $password, $age, $fitnessLevel, $gender, $email);

            $GLOBALS['database']->addUser($profileObj);
            $_SESSION['profile']=$profileObj;

            $row = $GLOBALS['database']->getUser($_POST['email']);
            $_SESSION['user']=$row['user_id'];

            $f3->set('registered','Thank you for registration!');

            $f3->reroute("profile");
        }


    }



    $view = new Template();
    echo $view->render('views/register.html');

});

//add a hike page
$f3->route('GET|POST /hike', function($f3) {

    //if hike form has been submitted add it to database and go to home page
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database= $GLOBALS['database'];
        $hikeObj=new Hikes($_POST['name'],$_POST['address'],$_POST['enjoyability'],$_POST['date']);


        $hikeObj->setLength($_POST['length']);
        $hikeObj->setElevationChange($_POST['elevationChange']);
        $hikeObj->setDifficulty($_POST['difficulty']);
        $hikeObj->setScenery($_POST['scenery']);

        $user = $_SESSION['user'];

        $database->addHike($hikeObj, $user);



        $f3->reroute("profile");
    }

    $view = new Template();
    echo $view->render('views/hike.html');
});

//add fishing page
$f3->route('GET|POST /fishing', function($f3) {

    //if fishing form has been submitted add it to database and go to home page
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $database= $GLOBALS['database'];
        $fishObj=new Fishing($_POST['name'],$_POST['address'],$_POST['enjoyability'],$_POST['date']);


        $fishObj->setDistanceFromParking($_POST['distanceFromParking']);
        $fishObj->setWaterType($_POST['water']);
        $fishObj->setSuccess($_POST['success']);
        $user = $_SESSION['user'];

        $database->addFishing($fishObj, $user);

        $f3->reroute("profile");
    }

    $f3->set('waters', getWaterTypes());

    $view = new Template();
    echo $view->render('views/fishing.html');
});

//logout route
$f3->route('GET /logout', function($f3) {


    session_destroy();
    $_SESSION = array();

    $f3->reroute("/");
});

// route to view hikes
$f3->route('GET /viewHiking', function($f3) {
    //get info from database that will be displayed on viewHiking page
    $database= $GLOBALS['database'];
    $data=$database->getHikes($_SESSION['user']);
    $f3->set('columns',array("Title","Address","Enjoyability","Length", "Elevation Change","Difficulty","Scenery", "Date"));
    $results=array();
    foreach ($data as $row){
        array_push($results,array($row['title'],$row['address'],$row['enjoyability'],$row['length'],$row['elevationChange'],$row['difficulty'],$row['scenery'],$row['date']));
    }
    $f3->set("results",$results);


    $view = new Template();
    echo $view->render('views/viewHiking.html');
});


// route to view fishing activities
$f3->route('GET /viewFishing', function($f3) {
    //get info from database that will be displayed on viewFishing page
    $database= $GLOBALS['database'];
    $data=$database->getFishing($_SESSION['user']);
    $f3->set('columns',array("Title","Address","Enjoyability","Distance From Parking", "Water Type","Success", "Date"));
    $results=array();
    foreach ($data as $row){
        array_push($results,array($row['title'],$row['address'],$row['enjoyability'],$row['distanceFromParking'],$row['waterType'],$row['success'],$row['date']));
    }
    $f3->set("results",$results);

    $view = new Template();
    echo $view->render('views/viewFishing.html');
});

//run
$f3->run();