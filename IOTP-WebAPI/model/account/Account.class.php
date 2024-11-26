<?php

class Account {
    /*
     * Properties
     */
    private $username;
    private $password;

    private $employeeID;
    private $employeeName;
    private $imagePath;
    
    private $role;

    /*
     * Constructor
     */
    public function __construct($username, $password, $employeeID, $employeeName, $imagePath, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->employeeID = $employeeID;
        $this->employeeName = $employeeName;
        $this->imagePath = $imagePath;
        $this->role = $role;
    }

    //Setters
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }
    public function setEmployeeName($employeeName) {
        $this->employeeName = $employeeName;
    }
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;
    }
    public function setRole($role) {
        $this->role = $role;
    }

    //Getters
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getEmployeeID() {
        return $this->employeeID;
    }
    public function getEmployeeName() {
        return $this->employeeName;
    }
    public function getImagePath() {
        return $this->imagePath;
    }
    public function getRole() {
        return $this->role;
    }
}