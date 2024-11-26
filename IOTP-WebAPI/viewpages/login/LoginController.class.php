<?php

require_once("abstract/Controller.class.php");

class LoginController extends Controller {

    private $accountHandler;

    /*
     * Constructor
     */
    public function __construct() {
        require_once("model/account/AccountHandler.class.php");

        $this->accountHandler = new AccountHandler();

        session_start();
    }


    /*
     * Action Runner
     */
    protected function run($action) {
        switch($action) {
            case "attemptLogin":
                $this->attemptLogin();
                break;
            case "exitDemo":
                header("location: index.php?controller=AboutUsController");
                exit();
        }
    }

    /**
     * Operational Functions Below
     */
    //Reload page.
    protected function reload() {
        include("viewpages/login/viewLogin.php");

        #Debug
//        $this->accountHandler->register("admin", "admin", "Super Admin", 1);
    }

    //Attempt Login
    private function attemptLogin() {
        #Clear User Session
        $this->clearUserSession();

        #Get Username & Password
        $username = $_POST['username'];
        $password = $_POST['password']; #Password is encrypted.

        #Login Attempt
        if($this->accountHandler->login($username, $password)) {
            #Get Account Data
            $_SESSION['employeeSession'] = $this->accountHandler->getAccount();

            echo "LOGIN SUCCESS\n";

            #Switch page to dashboard.
            header("location: index.php?controller=DashboardController");
            exit();
        }
        #Fail
        else {
            $this->reload();
            echo "LOGIN FAILED\n";
        }
    }

    //Clear User Session
    private function clearUserSession() {
        if(isset($_SESSION['employeeSession']) || !empty($_SESSION['employeeSession'])) {
            $_SESSION['employeeSession'] = null;
            unset($_SESSION['employeeSession']);
        }
    }

    //Logout
    public static function logout() {
        #Clear Session
        if(isset($_SESSION['employeeSession']) || !empty($_SESSION['employeeSession'])) {
            $_SESSION['employeeSession'] = null;
            unset($_SESSION['employeeSession']);
        }

        //Delete Controller cookies
        setcookie('userSession', $_GET['controller'], time() - 3600);

        #This controller switch selection doesn't exist.
        #But will default to the LoginController anyways...
        header("location: index.php?controller=LoginController");
        exit();
    }
}