<?php
$user = $_SERVER['USER'];
require_once "/home2/$user/config.php";
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

    } // end constructor


    function addUser($fname, $lname, $password,$email,$age,$gender,$fitnessLevel)
    {
        $dbh = $this->_dbh;
        // define the query
        $sql = "INSERT INTO profiles(firstName, lastName, password,email,age,gender,fitnessLevel,reg_date)
            VALUES (:fname, :lname, :password,:email,:age,:gender,:fitnessLevel, CURRENT_TIMESTAMP)";

        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':fname', $fname);
        $statement->bindParam(':lname', $lname);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->bindParam(':age', $age);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':fitnessLevel', $fitnessLevel);

        // execute
        $statement->execute();

    } // end addStudent

    function getUser($email){
        $dbh = $this->_dbh;

        $sql="SELECT * FROM profiles WHERE email=:email";

        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':email', $email);

        $result=$statement->execute();
        return $result;

    }

    function checkLogin($email,$password){
        $dbh = $this->_dbh;

        $sql="SELECT * FROM profiles WHERE email=:email";

        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':email', $email);

        $result=$statement->execute();

        if($result['password']==$password){
            return 1;
        }
        else{
            return 0;
        }



    }









}