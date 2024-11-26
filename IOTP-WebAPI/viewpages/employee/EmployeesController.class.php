<?php

require_once("abstract/Controller.class.php");

class EmployeesController extends Controller {

    /*
     * Constructor
     */
    public function __construct() {
        require_once("model/account/Account.class.php");
        require_once("model/employee/Employee.class.php");
        session_start();
    }

    /*
     * Action Runner
     */
    protected function run($action) {
        switch($action) {
            case "searchEmployees":
                break;
            case "openDashboard":
                header("location: index.php?controller=DashboardController");
                exit();
            case "openRequests":
                header("location: index.php?controller=RequestsController");
                exit();
            case "openDetails":
                $this->reloadDetails($_GET['employeeID']);
                exit();
            case "goBack":
                $this->reload();
                break;
            case "logout":
                require_once("viewpages/login/LoginController.class.php");
                LoginController::logout();
                break;
        }
    }

    /**
     * Operational Functions
     */
    //Reload page.
    protected function reload() {
        /*
         * Retrieve Data
         */
        #Account Data
        $empName = $_SESSION['employeeSession']->getEmployeeName();
        $empRole = $_SESSION['employeeSession']->getRole();
        $imagePath = $_SESSION['employeeSession']->getImagePath();

        #List of Employees
        require_once("model/employee/EmployeeHandler.class.php");
        $employees = (new EmployeeHandler())->getEmployeeList();

        #Most Active Employees
        $mostActive = (new EmployeeHandler())->getMostActiveEmployees(3);

        #Least Active Employees
        $leastActive = (new EmployeeHandler())->getLeastActiveEmployees(3);

        #Load Page
        include("viewpages/employee/viewEmployees.php");
//        include("viewpages/employee/viewTest.php");
    }

    //Load into Employee Details page.
    private function reloadDetails($employeeID) {
        /*
         * Retrieve Data
         */
        #Account Data
        $empName = $_SESSION['employeeSession']->getEmployeeName();
        $empRole = $_SESSION['employeeSession']->getRole();
        $imagePath = $_SESSION['employeeSession']->getImagePath();

        #Data on selected employee.
        require_once("model/employee/EmployeeHandler.class.php");
        $selectedEmployee = (new EmployeeHandler())->getSelectedEmployee($employeeID);
        $lastLogin = (new EmployeeHandler())->getLastLogin($employeeID);

        #Load Page
        include("viewpages/employee/viewEmployeesDetails.php");
    }
}