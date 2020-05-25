<?php

class Profile
{
    //Declare instance variables
    private $_firstName;
    private $_lastName;
    private $_userID;
    private $_password;
    private $_age;
    private $_fitnessLevel;
    private $_email;

    /**
     * Profile constructor.
     * @param $_firstName
     * @param $_lastName
     * @param $_userID
     * @param $_password
     * @param $_age
     * @param $_fitnessLevel
     * @param $_email
     */
    public function __construct($_firstName, $_lastName, $_userID, $_password, $_age, $_fitnessLevel, $_email)
    {
        $this->_firstName = $_firstName;
        $this->_lastName = $_lastName;
        $this->_userID = $_userID;
        $this->_password = $_password;
        $this->_age = $_age;
        $this->_fitnessLevel = $_fitnessLevel;
        $this->_email = $_email;
    }

    /**
     * This method checks if name, email, user ID, and password are filled out
     * @return bool true if all fields are filled, false if at least one is empty
     */
    function validateData()
    {
        $valid = true;

        if (empty($this->getFirstName()) || empty($this->getLastName()) ||
            empty($this->getUserID()) || empty($this->getPassword())) {
            $valid = false;
        }
        return $valid;
    }

    function changePassword()
    {

    }

    /** Set the first name
     * @param $firstName person's first name
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    /**
     * @return string first name
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /** Set the last name
     * @param $lastName person's last name
     */
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    /**
     * @return string last name
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->_userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->_userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /** Set the age
     * @param $firstName person's first name
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * @return int age
     */
    public function getAge()
    {
        return $this->_age;
    }

    /** Set the fitness level
     * @param $fitnessLevel person's fitness level
     */
    public function setFitnessLevel($fitnessLevel)
    {
        $this->_fitnessLevel = $fitnessLevel;
    }

    /**
     * @return string fitness level
     */
    public function getFitnessLevel()
    {
        return $this->_fitnessLevel;
    }

    /** Set the email address
     * @param $email person's email address
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string email address
     */
    public function getEmail()
    {
        return $this->_email;
    }
}