<?php

require_once("abstract/Controller.class.php");

class RequestsController extends Controller {

    /*
     * Constructor
     */
    public function __construct() {
        require_once("model/account/Account.class.php");
        require_once("model/employee/Employee.class.php");
        require_once("model/request/RequestHandler.class.php");

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
            case "openEmployees":
                header("location: index.php?controller=EmployeesController");
                exit();
            case "openPending":
                $_SESSION['req_page_selection'] = 0;
                $this->reload();
                break;
            case "openHistory":
                $_SESSION['req_page_selection'] = 1;
                $this->reload();
                break;
            case "approveLeaveRequest":
                (new Requesthandler)->approveLeaveRequest($_GET['rid'], $_GET['eid']);
                $this->reloadPending();
                break;
            case "approveLateRequest":
                (new Requesthandler)->approveLateRequest($_GET['rid']);
                $this->reloadPending();
                break;
            case "denyRequest":
                (new Requesthandler)->denyRequest($_GET['rid']);
                $this->reloadPending();
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
        if(isset($_SESSION['req_page_selection'])) {
            if($_SESSION['req_page_selection'] == 0) {
                $this->reloadPending();
            }
            else if($_SESSION['req_page_selection'] == 1) {
                $this->reloadHistory();
            }
        }
        else {
            $_SESSION['req_page_selection'] = 1;
            $this->reloadPending();
        }

    }
    private function reloadPending() {
        /*
         * Retrieve Data
         */
        #Account Data
        $empName = $_SESSION['employeeSession']->getEmployeeName();
        $empRole = $_SESSION['employeeSession']->getRole();
        $imagePath = $_SESSION['employeeSession']->getImagePath();

        #Requests
        $pendingRequests = (new RequestHandler())->getPendingRequests();

        #Load Page
        include("viewpages/requests/viewRequests.php");
    }
    private function reloadHistory() {
        /*
         * Retrieve Data
         */
        #Account Data
        $empName = $_SESSION['employeeSession']->getEmployeeName();
        $empRole = $_SESSION['employeeSession']->getRole();
        $imagePath = $_SESSION['employeeSession']->getImagePath();

        #Request History
        ##Looks for requests whose status is not 'Pending'.
        $requestHistory = (new RequestHandler())->getRequestHistory();

        #Load Page
        include("viewpages/requests/viewHistory.php");
    }
}