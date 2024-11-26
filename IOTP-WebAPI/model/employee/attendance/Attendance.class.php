<?php

class Attendance {
    /*
     * Properties
     */
    private $employee;

    private $lastAttendance;

    /*
     * Constructor
     */
    public function __construct() {}

    /*
     * Setter & Getters
     */
    public function setEmployee($employee) {
        $this->employee = $employee;
    }
    public function setLastAttendance($lastAttendance) {
        $this->lastAttendance = $lastAttendance;
    }

    public function getEmployee() {
        return $this->employee;
    }
    public function getLastAttendance() {
        return $this->lastAttendance;
    }
}