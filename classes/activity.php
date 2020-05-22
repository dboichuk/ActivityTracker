<?php

class Activity
{
    private $_title;
    private $_address;
    private $_enjoyability;
    private $_date;

    function __construct($title, $address, $enjoyability, $date)
    {
        $this->setTitle($title);
        $this->setAddress($address);
        $this->setEnjoyability($enjoyability);
        $this->setDate($date);
    }
}