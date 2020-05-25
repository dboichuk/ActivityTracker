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

    /**
     * Gets distance from parking spot
     * @return double
     */
    public function getDistanceFromParking()
    {
        return $this->_distanceFromParking;
    }

    /**
     * Sets distance from parking spot
     * @param double $distanceFromParking
     */
    public function setDistanceFromParking($distanceFromParking)
    {
        $this->_distanceFromParking = $distanceFromParking;
    }

    /**
     * Gets type of water fishing in
     * @return string
     */
    public function getWaterType()
    {
        return $this->_waterType;
    }

    /**
     * Sets what type of water fishing in
     * @param string $waterType
     */
    public function setWaterType($waterType)
    {
        $this->_waterType = $waterType;
    }

    /**
     * Gets success of fishing trip
     * @return string success of trip
     */
    public function getSuccess()
    {
        return $this->_success;
    }

    /**
     * Sets success of fishing trip
     * @param string $success
     */
    public function setSuccess($success)
    {
        $this->_success = $success;
    }


}