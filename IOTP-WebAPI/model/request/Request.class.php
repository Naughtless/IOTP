<?php

class Request {
    /*
     * Properties
     */
    private $id;
    private $employee;
    private $date;
    private $requestType;
    private $duration;
    private $reason;
    private $status;

    /*
     * Constructor
     */
    public function __construct() {}

    //Getters
    public function getID() {
        return $this->id;
    }
    public function getEmployee() {
        return $this->employee;
    }
    public function getDate() {
        return $this->date;
    }
    public function getRequestType() {
        return $this->requestType;
    }
    public function getDuration() {
        return $this->duration;
    }
    public function getReason() {
        return $this->reason;
    }
    public function getStatus() {
        return $this->status;
    }

    //Setters
    public function setID($id) {
        $this->id = $id;
    }
    public function setEmployee($employee) {
        $this->employee = $employee;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setRequestType($requestType) {
        $this->requestType = $requestType;
    }
    public function setDuration($duration) {
        $this->duration = $duration;
    }
    public function setReason($reason) {
        $this->reason = $reason;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
}
