<?php

class Fishing extends Activity
{
    private $_distanceFromParking;
    private $_waterType;
    private $_success;



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