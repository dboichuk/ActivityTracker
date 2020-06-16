<?php


/**
 * Class Hikes
 * This class is a child of Activity and contains information
 * specific to fishing trips (length of hike, elevation change,
 * difficulty, and any scenery comments)
 */
class Hikes extends Activity
{
    private $_length;
    private $_elevationChange;
    private $_difficulty;
    private $_scenery;


    /**
     * Gets the length of the hike
     * @return double length of hike
     */
    public function getLength()
    {
        return $this->_length;
    }

    /**
     * Sets length of the hike
     * @param double $length
     */
    public function setLength($length)
    {
        $this->_length = $length;
    }

    /**
     * Gets the elevation change
     * @return double elevation change
     */
    public function getElevationChange()
    {
        return $this->_elevationChange;
    }

    /**
     * Sets the elevation change
     * @param double $elevationChange
     */
    public function setElevationChange($elevationChange)
    {
        $this->_elevationChange = $elevationChange;
    }

    /**
     * Gets the difficulty
     * @return string difficulty of hike
     */
    public function getDifficulty()
    {
        return $this->_difficulty;
    }

    /**
     * Sets the difficulty
     * @param string $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->_difficulty = $difficulty;
    }

    /**
     * Gets scenery notes
     * @return string scenery from hike
     */
    public function getScenery()
    {
        return $this->_scenery;
    }

    /**
     * Sets scenery notes
     * @param string $scenery
     */
    public function setScenery($scenery)
    {
        $this->_scenery = $scenery;
    }
}