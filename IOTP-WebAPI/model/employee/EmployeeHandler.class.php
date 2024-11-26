<?php

class EmployeeHandler {
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

        require_once("model/employee/Employee.class.php");
    }

    /*
     * Setter & Getters
     */
    #Department List w/ Detailed Information
    #Returns an associative array.
    public function getEmployeeList() {
        $query = "
            SELECT 
                employees.id, 
                employees.employeeName, 
                employees.imagePath,
                employees.leaveQuota,
                employee_status.description, 
                roles.roleName, 
                departments.departmentName 
            FROM iotp.employees 
            JOIN iotp.roles ON employees.role = roles.id 
            JOIN iotp.departments ON roles.department = departments.id 
            JOIN iotp.employee_status ON employees.status = employee_status.id 
            WHERE employees.id <> 1;
        ";

        $resultSet = $this->dbController->runQuery($query);

        require_once("model/employee/attendance/AttendanceHandler.class.php");

        if(!empty($resultSet)) {
            $employeeList = array();
            foreach($resultSet as $value) {
                $currentEmployee = new Employee();

                /*
                 * Fill data for current iteration.
                 */
                #ID, Name, Role, Department, Status, LeaveQuota
                $currentEmployee->setID($value["id"]);
                $currentEmployee->setName($value["employeeName"]);
                $currentEmployee->setRole($value["roleName"]);
                $currentEmployee->setDepartment($value["departmentName"]);
                $currentEmployee->setStatus($value["description"]);
                $currentEmployee->setImagePath($value["imagePath"]);
                $currentEmployee->setLeaveQuota(($value["leaveQuota"]));

                #Attendance
                $attendanceData = (new AttendanceHandler())->getAttendanceStatOfEmployee($value["id"]);

                $currentEmployee->setOntimeCount($attendanceData[0]);
                $currentEmployee->setLateCount($attendanceData[1]);
                $currentEmployee->setAbsentCount($attendanceData[2]);

                #Input into array.
                $employeeList[] = $currentEmployee;
            }

            return $employeeList;
        }
        die("ERROR: Failed to get employee list!");
    }

    public function getSelectedEmployee($employeeID) {
        $query = "
            SELECT
                employees.id,
                employees.employeeName,
                employees.imagePath,
                roles.roleName,
                departments.departmentName,
                departments.workStart,
                departments.workEnd
            FROM employees
            JOIN roles ON employees.role = roles.id
            JOIN departments ON roles.department = departments.id
            WHERE employees.id = $employeeID
        ";

        $resultSet = $this->dbController->runQuery($query);

        require_once("model/employee/attendance/AttendanceHandler.class.php");

        if(!empty($resultSet)) {
            foreach($resultSet as $value) {
                $currentEmployee = new Employee();

                /*
                 * Fill Data
                 */
                $currentEmployee->setID($value["id"]);
                $currentEmployee->setName($value["employeeName"]);
                $currentEmployee->setImagePath($value["imagePath"]);
                $currentEmployee->setRole($value["roleName"]);
                $currentEmployee->setDepartment($value["departmentName"]);
                $currentEmployee->setShiftStart(substr($value["workStart"], 0, 5));
                $currentEmployee->setShiftEnd(substr($value["workEnd"], 0, 5));

                #Attendance
                $attendanceData = (new AttendanceHandler())->getAttendanceStatOfEmployee($value["id"]);

                $currentEmployee->setOntimeCount($attendanceData[0]);
                $currentEmployee->setLateCount($attendanceData[1]);
                $currentEmployee->setAbsentCount($attendanceData[2]);

                #Return
                return $currentEmployee;
            }
        }
    }

    public function getLastLogin($employeeID) {
        $query = "SELECT attendance.timecode FROM attendance WHERE employeeID = $employeeID ORDER BY attendance.timecode DESC;";
        $resultSet = $this->dbController->runQuery($query);

        if(!empty($resultSet)) {
            foreach($resultSet as $value) {
                #Return Data
                $rawData = $value["timecode"];
                return substr($rawData, 11, 16);
            }
        }
    }

    #Returns associative array.
    #Key: Employee, object.
    #Value: Activity Percentage, integer.
    public function getMostActiveEmployees($count) {
        $employeeList = $this->getEmployeeList();

        //Prelim array for sorting.
        $activityArray = array();
        foreach($employeeList as $currentEmployee) {
            $activityArray[$currentEmployee->getID()] = $currentEmployee->getActivityPercentage();
        }

        //Sort by value descending.
        arsort($activityArray);

        //Fill result array.
        $resultArray = array();

        $itrCount = 0;
        foreach($activityArray as $currID => $currActivity) { #Iterate through the three most active employees.
            foreach($employeeList as $currentEmployee) { #Iterate through the full employee list.
                if($itrCount == 3) { #Stop iteration if three iterations has been made already.
                    return $resultArray;
                }
                if($currentEmployee->getID() == $currID) { #If the iteration finds the specific employee with the same ID as $currentID,
                    $resultArray[] = $currentEmployee; #Put into resultArray.
                    $itrCount++;
                }
            }
        }

        return $resultArray;
    }

    #Returns associative array.
    #Key: Employee, object.
    #Value: Activity Percentage, integer.
    public function getLeastActiveEmployees($count) {
        $employeeList = $this->getEmployeeList();

        //Prelim array for sorting.
        $activityArray = array();
        foreach($employeeList as $currentEmployee) {
            $activityArray[$currentEmployee->getID()] = $currentEmployee->getActivityPercentage();
        }

        //Sort by value ascending.
        asort($activityArray);

        //Fill result array.
        $resultArray = array();
        $itrCount = 0;
        foreach($activityArray as $currID => $currActivity) { #Iterate through the three most active employees.
            foreach($employeeList as $currentEmployee) { #Iterate through the full employee list.
                if($itrCount == 3) { #Stop iteration if three iterations has been made already.
                    return $resultArray;
                }
                if($currentEmployee->getID() == $currID) { #If the iteration finds the specific employee with the same ID as $currentID,
                    $resultArray[] = $currentEmployee; #Put into resultArray.
                    $itrCount++;
                }
            }
        }

        return $resultArray;
    }
}