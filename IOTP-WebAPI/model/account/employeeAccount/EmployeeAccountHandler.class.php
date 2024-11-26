<?php

require_once("model/account/AccountHandler.class.php");

class EmployeeAccountHandler
    extends AccountHandler {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }


    /**
     * @override
     */
    #Check whether an account with this username exists.
    public function accountExists($username) {
        $accountData = $this->getDbController()->runQuery(
            "SELECT * FROM iotp.employee_accounts WHERE username = '$username'"
        );

        if($accountData != null) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * @override
     */
    #Retrieve Account
    public function retrieveAccount($username) {

        ### Phase 1 - Obtain [Password] and Employee ID
        $accountData = $this->getDbController()->runQuery(
            "SELECT * FROM iotp.employee_accounts WHERE username = '$username';"
        );

        $hashedPassword = null;
        $employeeID = null; #Employee ID

        if(!empty($accountData)) {
            foreach($accountData as $value) {
                $hashedPassword = $value["password"];
                $employeeID = $value["employeeID"];
            }
        }

        ### Phase 2 - Obtain [Employee Name], Role ID, and Image Path
        $employeeData = $this->getDbController()->runQuery(
            "SELECT * FROM iotp.employees WHERE id = $employeeID;"
        );

        $employeeName = null; #Employee Name
        $roleID = null;
        $imagePath = null; #Employee Portrait Image

        if(!empty($employeeData)) {
            foreach($employeeData as $value) {
                $employeeName = $value["employeeName"];
                $roleID = $value["role"];
                $imagePath = $value["imagePath"];
            }
        }

        ### Phase 3 - Obtain [Employee Role]
        $roleData = $this->getDbController()->runQuery("SELECT * FROM iotp.roles WHERE id = $roleID");

        $role = null; #Employee Role

        if(!empty($roleData)) {
            foreach($roleData as $value) {
                $role = $value["roleName"];
            }
        }

        $this->setAccount(
            new Account(
                $username, //Username
                $hashedPassword, //Password
                $employeeID,
                $employeeName,
                $imagePath,
                $role
            )
        );
    }

    /**
     * @override
     */
    #Login
    public function login($username, $password) {
        //Verify whether that account exists or not.
        if(!$this->accountExists($username)) {
            return false;
        }

        //Retrieve account data according to username.
        $this->retrieveAccount($username);

        //Verify whether the password is correct. -- Password stored on $account is encrypted.
        return PasswordHasher::verifyPassword($password, $this->getAccount()->getPassword());
    }



    #Employee Register (on existing employee)
    public function registerExisting($username, $password, $employeeID) {
        #Check if account username is available.
        if($this->accountExists($username)) {
            return false;
        }

        #Encrypt Password
        $encryptedPassword = PasswordHasher::hashPassword($password);

        #Query DB
        $this->getDbController()->runQueryNoResult(
            "INSERT INTO iotp.employee_accounts VALUES ('$username', '$encryptedPassword', $employeeID);"
        );

        #Confirm registration success.
        return true;
    }

    #Employee Register (new employee)
    public function registerNew($username, $password, $name, $roleID) {
        #Check if account username is available.
        if($this->accountExists($username)) {
            return false;
        }

        #Query DB - Employee
        $this->getDbController()->runQueryNoResult(
            "INSERT INTO iotp.employees (employeeName, role) VALUES ('$name', $roleID);"
        );

        #Query DB - Obtain Auto-Gen Employee ID.
        $eidResultSet = $this->getDbController()->runQuery(
            "SELECT employees.id FROM iotp.employees WHERE employees.employeeName = '$name' AND employees.role = $roleID;"
        );

        $employeeID = null;

        if(!empty($eidResultSet)) {
            foreach($eidResultSet as $value) {
                $employeeID = $value["id"];
            }
        }

        #Encrypt Password
        $encryptedPassword = PasswordHasher::hashPassword($password);

        #Query DB - Account
        $this->getDbController()->runQueryNoResult(
            "INSERT INTO iotp.employee_accounts VALUES ('$username', '$encryptedPassword', $employeeID);"
        );

        #Confirm registration success.
        return true;
    }

}