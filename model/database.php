<?php
//used to get CONFIG file
$user = $_SERVER['USER'];
require_once "/home2/$user/config.php";


/**
 * Class Database
 * This class will interact with the database for the app
 */
class Database
{
    private $_dbh;

    /**
     * Database constructor.
     * Establishes connection with database
     * @return void
     */
    function __construct()
    {
        $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    } // end constructor


    /**
     * This function will add user to the database
     * @param $profileObj profile object
     */
    function addUser($profileObj)
    {
        $dbh = $this->_dbh;
        // define the query
        $sql = "INSERT INTO profiles(firstName, lastName, password,email,age,gender,fitnessLevel,reg_date)
            VALUES (:fname, :lname, :password,:email,:age,:gender,:fitnessLevel, CURRENT_TIMESTAMP)";

        // prepare the statement
        $statement = $dbh->prepare($sql);

        $statement->bindParam(':fname', $profileObj->getFirstName(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $profileObj->getLastName(), PDO::PARAM_STR);
        $statement->bindParam(':email', $profileObj->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':password', $profileObj->getPassword(), PDO::PARAM_STR);
        $statement->bindParam(':age', $profileObj->getAge(), PDO::PARAM_STR);
        $statement->bindParam(':gender', $profileObj->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':fitnessLevel', $profileObj->getFitnessLevel(), PDO::PARAM_STR);

        // execute
        $statement->execute();

    } // end addUser

    /**
     * This function will return a user info from database
     * @param $email  email
     * @return mixed data base info
     */
    function getUser($email)
    {
        $dbh = $this->_dbh;

        $sql = "SELECT * FROM profiles WHERE email=:email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    } // end getUser

    /**
     * This function will check if the login is correct
     * @param $email
     * @param $password
     * @return int result
     */
    function checkLogin($email,$password)
    {
        $dbh = $this->_dbh;

        $sql = "SELECT * FROM profiles WHERE email=:email";

        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':email', $email);

        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);


        if ($result['password'] == $password) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * This function will add hike to the database
     * @param $hikeObj
     * @param $user
     */
    function addHike($hikeObj, $user)
    {
            $dbh = $this->_dbh;
            // define the query
            $sql = "INSERT INTO hikes(title, address, enjoyability, length, elevationChange, difficulty, scenery, date, user)
            VALUES (:title, :address, :enjoyability, :length, :elevationChange, :difficulty, :scenery, :date , :user)";



            // prepare the statement
            $statement = $dbh->prepare($sql);

            $statement->bindParam(':title', $hikeObj->getTitle(),PDO::PARAM_STR );
            $statement->bindParam(':address', $hikeObj->getAddress(), PDO::PARAM_STR);
            $statement->bindParam(':enjoyability', $hikeObj->getEnjoyability(),PDO::PARAM_STR);
            $statement->bindParam(':length', $hikeObj->getLength(),PDO::PARAM_STR);
            $statement->bindParam(':elevationChange', $hikeObj->getElevationChange(),PDO::PARAM_STR);
            $statement->bindParam(':difficulty', $hikeObj->getDifficulty(),PDO::PARAM_STR);
            $statement->bindParam(':scenery', $hikeObj->getScenery(),PDO::PARAM_STR);
            $statement->bindParam(':date', $hikeObj->getDate(),PDO::PARAM_STR);
            $statement->bindParam(':user', $user,PDO::PARAM_STR);



            $statement->execute();




    } // end addHike

    /**
     * This function will get all the hikes that user added
     * @param $user
     * @return array with results
     */
    function getHikes($user)
    {
            $dbh = $this->_dbh;

            $sql = "SELECT * FROM hikes WHERE user = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$user]);
            return $stmt->fetchAll();

    } // end getHikes

    /**
     * This function will add fishing activity to database
     * @param $fishObj
     * @param $user
     */
    function addFishing($fishObj, $user)
    {
            $dbh = $this->_dbh;
            // define the query
            $sql = "INSERT INTO fishing(title, address, enjoyability, distanceFromParking, waterType, success, date, user)
            VALUES (:title, :address, :enjoyability, :distanceFromParking, :waterType, :success, :date, :user)";



            // prepare the statement
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $fishObj->getTitle());
            $statement->bindParam(':address', $fishObj->getAddress());
            $statement->bindParam(':enjoyability', $fishObj->getEnjoyability());
            $statement->bindParam(':distanceFromParking', $fishObj->getDistanceFromParking());
            $statement->bindParam(':waterType', $fishObj->getWaterType());
            $statement->bindParam(':success', $fishObj->getSuccess());
            $statement->bindParam(':date', $fishObj->getDate());
            $statement->bindParam(':user', $user);

            // execute
            $statement->execute();



    } // end addFishing

    /**
     * This function will get all the fishing activities that user added
     * @param $user
     * @return array with results from database
     */
    function getFishing($user)
    {
            $dbh = $this->_dbh;

            $sql = "SELECT * FROM fishing WHERE user = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$user]);
            return $stmt->fetchAll();

    } // end getFishing











}