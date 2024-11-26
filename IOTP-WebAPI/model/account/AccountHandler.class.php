<?php

class AccountHandler {
    /*
     * Properties
     */
    private $dbController;
    private $account;

    /*
     * Constructor
     */
    public function __construct() {
        require_once("database/DatabaseHandler.class.php");
        $this->dbController = new DatabaseHandler();

        require_once("model/account/Account.class.php");
        require_once("model/account/PasswordHasher.class.php");
    }


    /*
     * Registration / Login
     */

    #Check whether an account with this username exists.
    public function accountExists($username) {
        $accountData = $this->dbController->runQuery(
            "SELECT * FROM accounts WHERE username = '$username'"
        );

        if($accountData != null) {
            return true;
        }
        else {
            return false;
        }
    }

    #Retrieve Account
    public function retrieveAccount($username) {

        ### Phase 1 - Obtain [Password] and Employee ID
        $accountData = $this->dbController->runQuery("SELECT * FROM accounts WHERE username = '$username'");

        $hashedPassword = null;
        $employeeID = null;

        if(!empty($accountData)) {
            foreach($accountData as $value) {
                $hashedPassword = $value["password"];
                $employeeID = $value["employeeID"];
            }
        }

        ### Phase 2 - Obtain [Employee Name], Role ID, and Image Path
        $employeeData = $this->dbController->runQuery("SELECT * FROM iotp.employees WHERE id = $employeeID");

        $employeeName = null;
        $roleID = null;
        $imagePath = null;

        if(!empty($employeeData)) {
            foreach($employeeData as $value) {
                $employeeName = $value["employeeName"];
                $roleID = $value["role"];
                $imagePath = $value["imagePath"];
            }
        }

        ### Phase 3 - Obtain [Employee Role]
        $roleData = $this->dbController->runQuery("SELECT * FROM iotp.roles WHERE id = $roleID");

        $role = null;

        if(!empty($roleData)) {
            foreach($roleData as $value) {
                $role = $value["roleName"];
            }
        }

        $this->account = new Account(
            $username,
            $hashedPassword,
            $employeeID,
            $employeeName,
            $imagePath,
            $role
        );
    }

    #Login
    public function login($username, $password) {
        //Verify whether that account exists or not.
        if(!$this->accountExists($username)) {
            return false;
        }

        //Retrieve account data according to username.
        $this->retrieveAccount($username);

        //Verify whether the password is correct. -- Password stored on $account is encrypted.
        return PasswordHasher::verifyPassword($password, $this->account->getPassword());
    }

    #Register
    public function register($username, $password, $accountName, $role) {
        //Check if account of the same username already exists.
        if($this->accountExists($username)) {
            return false;
        }

        //Encrypt password.
        $encryptedPassword = PasswordHasher::hashPassword($password);

        //Input account information into database.
        $this->dbController->runQueryNoResult(
            "INSERT INTO accounts (username, password, accountName, role) VALUES ('$username', '$encryptedPassword', '$accountName', $role)"
        );

        //If everything checks out.
        return true;
    }



    /*
     * [Setter & Getter]
     * Retrieve Stored Account Information
     */
    public function setAccount($account) {
        $this->account = $account;
    }
    public function getAccount()
    {
        return $this->account;
    }

    public function setDbController($dbController) {
        $this->dbController = $dbController;
    }
    public function getDbController() {
        return $this->dbController;
    }
}