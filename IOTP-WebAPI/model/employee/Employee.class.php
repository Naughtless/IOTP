<?php

class Employee {
    /*
     * Properties
     */
    private $id;
    private $name;
    private $role;
    private $department;
    private $imagePath;
    private $status;

    private $ontime;
    private $late;
    private $absent;

    private $shiftStart;
    private $shiftEnd;

    private $leaveQuota;

    /*
     * Constructor
     */
    public function __construct() {}

    //Getters
    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getRole() {
        return $this->role;
    }
    public function getDepartment() {
        return $this->department;
    }
    public function getImagePath() {
        return $this->imagePath;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getOntimeCount() {
        return $this->ontime;
    }
    public function getLateCount() {
        return $this->late;
    }
    public function getAbsentCount() {
        return $this->absent;
    }
    public function getActivityPercentage() {
        $rawPercentage =  ($this->ontime + ($this->late/2)) / ($this->ontime + $this->late + $this->absent) * 100;
        return number_format($rawPercentage, 0, '.', '');
    }
    public function getOntimePercentage() {

    }
    public function getLatePercentage() {

    }
    public function getAbsentPercentage() {

    }
    public function getShiftStart() {
        return $this->shiftStart;
    }
    public function getShiftEnd() {
        return $this->shiftEnd;
    }
    public function getLeaveQuota() {
        return $this->leaveQuota;
    }

    //Setters
    public function setID($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setRole($role) {
        $this->role = $role;
    }
    public function setDepartment($department) {
        $this->department = $department;
    }
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function setOntimeCount($otc) {
        $this->ontime = $otc;
    }
    public function setLateCount($lc) {
        $this->late = $lc;
    }
    public function setAbsentCount($ac) {
        $this->absent = $ac;
    }
    public function setShiftStart($shiftStart) {
        $this->shiftStart = $shiftStart;
    }
    public function setShiftEnd($shiftEnd) {
        $this->shiftEnd = $shiftEnd;
    }
    public function setLeaveQuota($leaveQuota) {
        $this->leaveQuota = $leaveQuota;
    }
}