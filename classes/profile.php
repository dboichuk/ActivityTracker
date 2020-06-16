<?php


/**
 * Class Profile
 * This class creates a user profile to be used
 * for logging in and saving activity data
 */
class Profile
{
    //Declare instance variables
    private $_firstName;
    private $_lastName;
    private $_password;
    private $_age;
    private $_gender;
    private $_fitnessLevel;
    private $_email;


    /**
     * Profile constructor.
     * @param $_firstName
     * @param $_lastName
     * @param $_password
     * @param $_age
     * @param $_fitnessLevel
     * @param $_email
     */
    public function __construct($_firstName, $_lastName, $_password, $_age, $_fitnessLevel, $_gender, $_email)
    {
        $this->_firstName = $_firstName;
        $this->_lastName = $_lastName;
        $this->_password = $_password;
        $this->_age = $_age;
        $this->_gender = $_gender;
        $this->_fitnessLevel = $_fitnessLevel;
        $this->_email = $_email;

    }

    /**Gets the gender
     * @return mixed
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**Sets the gender
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /** Set the first name
     * @param $firstName person's first name
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    /**Gets first name
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

    /**Gets last name
     * @return string last name
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**Gets the password
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /** Set the password
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

    /**Gets the age
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

    /**Gets the fitness level
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

    /**Gets the email address
     * @return string email address
     */
    public function getEmail()
    {
        return $this->_email;
    }
}