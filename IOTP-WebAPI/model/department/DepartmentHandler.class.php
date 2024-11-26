<?php

class DepartmentHandler {
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

        require_once("model/department/Department.class.php");
    }

    /*
     * Setter & Getter
     */
    #Department List w/ Detailed Information
    #Returns an associative array.
    public function getDepartmentList() {
        $query = "SELECT * FROM iotp.departments;";
        $resultSet = $this->dbController->runQuery($query);

        if(!empty($resultSet)) {
            $departmentList = array();
            foreach($resultSet as $value) {
                $currentDepartment = new Department();

                /*
                 * Fill data for current iteration.
                 */
                #Department ID & Name
                $currentDepartment->setID($value["id"]);
                $currentDepartment->setName($value["departmentName"]);

                #More complicated timecode Data.
                $finalWSTC = substr($value["workStart"], 0, 5);
                $currentDepartment->setWSTC($finalWSTC);

                $finalWETC = substr($value["workEnd"], 0, 5);
                $currentDepartment->setWETC($finalWETC);

                #Attendance Data
                $currentDepartment->setAttendancePercentage(strval(rand(6, 11)) . "%"); //Placeholder!


                #Input into array.
                $departmentList[] = $currentDepartment;
            }
            return $departmentList;
        }
        die("ERROR: Failed to get department list!");
    }
}