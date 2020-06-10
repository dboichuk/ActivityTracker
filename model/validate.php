<?php

class Validate
{
    private $_f3;

    /**
     * Validate constructor.
     * @param $_f3
     */
    public function __construct($_f3)
    {
        $this->_f3 = $_f3;
    }


    function validName($fName, $lName)
    {
        $name = $fName . $lName;
        $name = str_replace(' ', '', $name);

        if (empty($name) || !ctype_alpha($name)) {
            return false;
        }
        return true;
    }

    /* Return a value indicating if age is valid
       Valid meals are between 18 and 118
       @param String $age
       @return boolean
    */
    function validAge($age)
    {
        return !empty($age) && $age >= 18 && $age <= 118;
    }

    /* Return a value indicating if email is valid
       @param String $email
       @return boolean
    */
    function validEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    function validPassword($password, $cpassword)
    {
        if(!empty($password) && ($password == $cpassword)) {
            if (strlen($password <= '8')) {
                $this->_f3->set("errors['passLength']", "Passwords must be at least 8 characters.");
            }
            elseif(!preg_match("#[0-9]+#",$password)) {
                $this->_f3->set("errors['passNumber']", "Passwords must contain at least 1 number.");
            }
            elseif(!preg_match("#[A-Z]+#",$password)) {
                $this->_f3->set("errors['passCapital']", "Passwords must contain at least 1 capital letter.");
            }
            elseif(!preg_match("#[a-z]+#",$password)) {
                $this->_f3->set("errors['passLower']", "Passwords must contain at least 1 lower case letter.");
            }
        }
        elseif(!empty($password)) {
            $this->_f3->set("errors['passConfirm']", "Passwords do not match.");
        } else {
            $this->_f3->set("errors['passEmpty']", "Please enter a password.");
        }
    }
}