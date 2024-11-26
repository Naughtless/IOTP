<?php

class Department {
    /*
     * Properties
     */
    private $id;
    private $name;

    private $attendancePercentage;
    private $workStartTC;
    private $workEndTC;

    /*
     * Constructor
     */
    public function __construct() {
    }

    /*
     * Setter & Getters
     */
    public function setID($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setAttendancePercentage($attp) {
        $this->attendancePercentage = $attp;
    }
    public function setWSTC($wstc) {
        $this->workStartTC = $wstc;
    }
    public function setWETC($wetc) {
        $this->workEndTC = $wetc;
    }

    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getAttendancePercentage() {
        return $this->attendancePercentage;
    }
    public function getWSTC() {
        return $this->workStartTC;
    }
    public function getWETC() {
        return $this->workEndTC;
    }
}