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

    /** Default constructor
     * @param $firstName first name
     * @param $lastName last name
     * @param $age age of the person
     * @param $fitnessLevel fitness level of the person
     * @param $address person's address
     */
    public function __construct($firstName, $lastName, $age,
                                $fitnessLevel, $email)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setAge($age);
        $this->setFitnessLevel($fitnessLevel);
        $this->setEmail($email);
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