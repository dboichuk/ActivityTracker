<?php


/**
 * Class Activity
 * This parent class contains generalized activity information
 * for the name of the event, address, enjoyability, and date
 * when it occurred
 */
class Activity
{
    private $_title;
    private $_address;
    private $_enjoyability;
    private $_date;


    /**
     * Activity constructor.
     * @param $title title of activity
     * @param $address address where activity performed
     * @param $enjoyability how enjoyable it was
     * @param $date when activity occurred
     */
    function __construct($title, $address, $enjoyability, $date)
    {
        $this->setTitle($title);
        $this->setAddress($address);
        $this->setEnjoyability($enjoyability);
        $this->setDate($date);
    }

    /**
     * Gets title
     * @return string title of activity
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Sets title
     * @param string $title title of activity
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Gets address of activity
     * @return string address of activity
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * Sets address of activity
     * @param string $address address of activity
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * Gets enjoyability level of activity
     * @return string enjoyability
     */
    public function getEnjoyability()
    {
        return $this->_enjoyability;
    }

    /**
     * Sets enjoyability level
     * @param string $enjoyability enjoyability of activity
     */
    public function setEnjoyability($enjoyability)
    {
        $this->_enjoyability = $enjoyability;
    }

    /**
     * Gets date when activity occurred
     * @return DateTime Date/Time of activity
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * Sets date/time when activity occurred
     * @param DateTime $date when activity occurred
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }


}