<?php

class RequestHandler {
    /*
     * Properties
     */
    private $dbController;

    /*
     * Constructor
     */
    public function __construct() {
        require_once("database/DatabaseHandler.class.php");
        $this->dbController = new DatabaseHandler();

        require_once("model/request/Request.class.php");
    }

    /*
     * Setter & Getters
     */
    #Gets a list of all requests where status is 'Pending'
    public function getPendingRequests() {
        $query = "
            SELECT
                requests.id as requestID,
                requests.employee as employeeID,
                employees.employeeName,
                employees.imagePath,
                departments.departmentName,
                roles.roleName,
                requests.date,
                requests.requestType,
                requests.duration,
                requests.reason,
                requests.status
            FROM requests
            JOIN employees ON requests.employee = employees.id
            JOIN roles ON employees.role = roles.id
            JOIN departments ON roles.department = departments.id
            WHERE requests.status = 'Pending'
            ORDER BY requests.date DESC;
        ";

        $resultSet = $this->dbController->runQuery($query);

        if(!empty($resultSet)) {
            $pendingRequestList = array();

            foreach($resultSet as $value) {
                $currentRequest = new Request();

                #Employee Details
                $currentEmployee = new Employee();
                $currentEmployee->setID($value["employeeID"]);
                $currentEmployee->setName($value["employeeName"]);
                $currentEmployee->setImagePath($value["imagePath"]);
                $currentEmployee->setDepartment($value["departmentName"]);
                $currentEmployee->setRole($value["roleName"]);

                $currentRequest->setEmployee($currentEmployee);

                #Request ID
                $currentRequest->setID($value["requestID"]);

                #Request Date
                $currentRequest->setDate($value["date"]);

                #Request Type
                $currentRequest->setRequestType($value["requestType"]);

                #Duration -- is counted in hours.
                $currentRequest->setDuration($value["duration"]);

                #Reason
                $currentRequest->setReason($value["reason"]);

                #Status
                $currentRequest->setStatus($value["status"]);

                /*
                 * Input into array.
                 */
                $requestList[] = $currentRequest;
            }
            return $requestList;
        }
        return null;
    }

    #Gets a list of all requests where status is NOT 'Pending'
    public function getRequestHistory() {
        $query = "
            SELECT
                requests.employee as employeeID,
                employees.employeeName,
                employees.imagePath,
                departments.departmentName,
                roles.roleName,
                requests.date,
                requests.requestType,
                requests.duration,
                requests.status
            FROM requests
            JOIN employees ON requests.employee = employees.id
            JOIN roles ON employees.role = roles.id
            JOIN departments ON roles.department = departments.id
            WHERE requests.status <> 'Pending'
            ORDER BY requests.date DESC;
        ";
        $resultSet = $this->dbController->runQuery($query);

        if(!empty($resultSet)) {
            $requestList = array();
            foreach($resultSet as $value) {
                $currentRequest = new Request();

                #Employee Details
                $currentEmployee = new Employee();
                $currentEmployee->setID($value["employeeID"]);
                $currentEmployee->setName($value["employeeName"]);
                $currentEmployee->setImagePath($value["imagePath"]);
                $currentEmployee->setDepartment($value["departmentName"]);
                $currentEmployee->setRole($value["roleName"]);

                $currentRequest->setEmployee($currentEmployee);

                #Request Date
                $currentRequest->setDate($value["date"]);

                #Request Type
                $currentRequest->setRequestType($value["requestType"]);

                #Duration -- is counted in hours.
                $currentRequest->setDuration($value["duration"]);

                #Status
                $currentRequest->setStatus($value["status"]);

                /*
                 * Input into array.
                 */
                $requestList[] = $currentRequest;
            }
            return $requestList;
        }
        die("ERROR: Failed to get request history list!");
    }

    #Get Request by ID.
    private function getRequestByID($rid) {

    }

    /**
     * Ops
     */
    #Deny Request
    public function denyRequest($rid) {
        #Update request status on DB to 'Declined'
        $query = "UPDATE iotp.requests SET status = 'Declined' WHERE id = $rid;";
        $this->dbController->runQueryNoResult($query);
    }

    public function approveLateRequest($rid) {
        #Update request status on DB to 'Accepted'
        $query = "UPDATE iotp.requests SET status = 'Accepted' WHERE id = $rid;";
        $this->dbController->runQueryNoResult($query);
    }

    public function approveLeaveRequest($rid, $eid) {
        #Update request status on DB to 'Accepted'
        $queryReq = "UPDATE iotp.requests SET status = 'Accepted' WHERE id = $rid;";
        $this->dbController->runQueryNoResult($queryReq);

        #Decrement employee leave quota on DB.
        $queryEmp = "UPDATE iotp.employees SET leaveQuota = leaveQuota - 1 WHERE id = $eid;";
        $this->dbController->runQueryNoResult($queryEmp);

        #Set employee status to 'On Leave' on DB.
        $queryEmpSt = "UPDATE iotp.employees SET status = 2 WHERE id = $eid;";
        $this->dbController->runQueryNoResult($queryEmpSt);
    }
}