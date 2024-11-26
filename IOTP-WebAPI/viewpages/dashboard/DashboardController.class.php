<?php

require_once("abstract/Controller.class.php");

class DashboardController
    extends Controller {

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
            //Sidebar Actions
            case "searchEmployees":
                break;
            case "openEmployees":
                header("location: index.php?controller=EmployeesController");
                exit();
            case "openRequests":
                header("location: index.php?controller=RequestsController");
                exit();
            case "openEmployeeDetails":
                header("location: index.php?controller=EmployeesController&action=openDetails&employeeID=" . $_GET['employeeID']);
                exit();
            case "sortByDate":
                $this->reload();
                break;
            case "logout":
                require_once("viewpages/login/LoginController.class.php");
                LoginController::logout();
                break;
        }
    }

    /**
     * Operational Functions Below
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

        #Attendance Stats
        $attendanceStats = $this->getAttendanceStats();

        #Recent Attendees
        require_once("model/employee/attendance/AttendanceHandler.class.php");
        $attendees = (new AttendanceHandler())->getAttendanceList();

        #List of Departments
        require_once("model/department/DepartmentHandler.class.php");
        $departments = (new DepartmentHandler())->getDepartmentList();

        #Load Page
        include("viewpages/dashboard/viewDashboard.php");
//        include("viewpages/testView.php"); #Debug Test.
    }

    #Return an array.
    private function getAttendanceStats() {
        require_once("model/employee/attendance/AttendanceHandler.class.php");

        #If a date is selected.
        if(isset($_GET['selectedDate'])) {
            return (new AttendanceHandler())->getAttendanceStatsOnDate($_GET['selectedDate']);
        }

        #If no date is selected.
        else {
            return (new AttendanceHandler())->getAttendanceStats();
        }
    }
}