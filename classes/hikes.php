<?php

class Hikes extends Activity
{
    private $_length;
    private $_elevationChange;
    private $_difficulty;
    private $_scenery;

    /**
     * Hikes constructor.
     * @param $_length
     * @param $_elevationChange
     * @param $_difficulty
     * @param $_scenery
     */
    public function __construct($_length, $_elevationChange, $_difficulty, $_scenery)
    {
        $this->_length = $_length;
        $this->_elevationChange = $_elevationChange;
        $this->_difficulty = $_difficulty;
        $this->_scenery = $_scenery;
    }


}