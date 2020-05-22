<?php

class Fishing extends Activity
{
    private $_distanceFromParking;
    private $_waterType;
    private $_success;

    /**
     * Fishing constructor.
     * @param $_distanceFromParking
     * @param $_waterType
     * @param $_success
     */
    public function __construct($_distanceFromParking, $_waterType, $_success)
    {
        $this->_distanceFromParking = $_distanceFromParking;
        $this->_waterType = $_waterType;
        $this->_success = $_success;
    }


}