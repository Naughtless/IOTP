<?php

class AttendanceStat {
    /*
     * Properties
     */
    private $employeeID;
    private $attDate;
    private $attTime;
    private $workStart;

    /*
     * Constructor
     */
    public function __construct() {}

    /*
     * Setter & Getters
     */
    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }
    public function setAttDate($date) {
        $this->attDate = $date;
    }
    public function setAttTime($attTime) {
        $this->attTime = $attTime;
    }
    public function setWorkStart($workStart) {
        $this->workStart = $workStart;
    }

    public function getEmployeeID() {
        return $this->employeeID;
    }
    public function getAttDate() {
        return $this->attDate;
    }
    public function getAttTime() {
        return $this->attTime;
    }
    public function getWorkStart() {
        return $this->workStart;
    }
}