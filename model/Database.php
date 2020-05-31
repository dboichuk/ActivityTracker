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
        $this->_dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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

    } // end addUser

    function getUser($email)
    {
        $dbh = $this->_dbh;

        $sql = "SELECT * FROM profiles WHERE email=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row;

    } // end getUser

    function checkLogin($email,$password)
    {
        $dbh = $this->_dbh;

        $sql="SELECT * FROM profiles WHERE email=:email";

        // prepare the statement
        $statement = $dbh->prepare($sql);
        $statement->bindParam(':email', $email);

        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);


        if($result['password']==$password){
            return 1;
        }
        else{
            return 0;
        }

        function addHike($title, $address, $enjoyability, $length, $elevationChange, $difficulty, $scenery, $date, $user)
        {
            $dbh = $this->_dbh;
            // define the query
            $sql = "INSERT INTO hikes(title, address, enjoyability, length, elevationChange, difficulty, scenery, date, user)
            VALUES (:title, :address, :enjoyability, :length, :elevationChange, :difficulty, :scenery, :date, :user)";

            // prepare the statement
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':address', $address);
            $statement->bindParam(':enjoyability', $enjoyability);
            $statement->bindParam(':length', $length);
            $statement->bindParam(':elevationChange', $elevationChange);
            $statement->bindParam(':difficulty', $difficulty);
            $statement->bindParam(':scenery', $scenery);
            $statement->bindParam(':date', $date);
            $statement->bindParam(':user', $user);

            $statement->execute();

        } // end addHike

        function getHikes($user)
        {
            $dbh = $this->_dbh;

            $sql = "SELECT * FROM hikes WHERE user = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$user]);
            return $stmt->fetch();

        } // end getHikes

        function addFishing($title, $address, $enjoyability, $distanceFromParking, $waterType, $success, $date, $user)
        {
            $dbh = $this->_dbh;
            // define the query
            $sql = "INSERT INTO fishing(title, address, enjoyability, distanceFromParking, waterType, success, date, user)
            VALUES (:title, :address, :enjoyability, :distanceFromParking, :waterType, :success, :date, :user)";

            // prepare the statement
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':address', $address);
            $statement->bindParam(':enjoyability', $enjoyability);
            $statement->bindParam(':distanceFromParking', $distanceFromParking);
            $statement->bindParam(':waterType', $waterType);
            $statement->bindParam(':success', $success);
            $statement->bindParam(':date', $date);
            $statement->bindParam(':user', $user);

            // execute
            $statement->execute();

        } // end addFishing

        function getFishing($user)
        {
            $dbh = $this->_dbh;

            $sql = "SELECT * FROM fishing WHERE user = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$user]);
            return $stmt->fetch();

        } // end getFishing

    }









}