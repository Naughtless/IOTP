<?php

class AttendanceHandler {
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

        require_once("model/employee/attendance/Attendance.class.php");
    }

    /*
     * Setter & Getter
     */
    #Recent Attendees List. Limit 10.
    public function getAttendanceList() {
        $query = "SELECT employees.employeeName, employees.imagePath, roles.roleName, attendance.timecode FROM iotp.employees JOIN iotp.roles ON employees.role = roles.id JOIN iotp.attendance ON employees.id = attendance.employeeID WHERE employees.id <> 1 ORDER BY timecode DESC LIMIT 10;";
        $resultSet = $this->dbController->runQuery($query);

        if(!empty($resultSet)) {
            $attendanceList = array();
            foreach($resultSet as $value) {
                $currentAttendee = new Attendance();

                /*
                 * Fill Data
                 */
                /* Employee Data */
                #Create a new Employee object.
                $currentAttendee->setEmployee(new Employee);

                #Employee Name & Role
                $currentAttendee->getEmployee()->setName($value["employeeName"]);
                $currentAttendee->getEmployee()->setRole($value["roleName"]);
                $currentAttendee->getEmployee()->setImagePath($value["imagePath"]);


                /* Attendance Data */
                #Last Attendance
                $currentAttendee->setLastAttendance(substr($value["timecode"], 11, 5));


                /* Input into array */
                $attendanceList[] = $currentAttendee;
            }
            return $attendanceList;
        }
        die("ERROR: Failed to get recent attendees list.");
    }

    private function getTotalEmployeeCount() {
        $eqQuery = "SELECT COUNT(employees.id) AS employeeCount FROM employees WHERE employees.role <> 1;";
        $eqResultSet = $this->dbController->runQuery($eqQuery);

        if(!empty($eqResultSet)) {
            foreach($eqResultSet as $value) {
                return $value["employeeCount"];
            }
        }
        die("ERROR: Failed to retrieve total employee count");
    }

    #Function
    public function getAttendanceStats() {
        #Declare vars.
        $totalEmployees = $this->getTotalEmployeeCount();
        $ontimeEmployees = 0;
        $lateEmployees = 0;
        $absentEmployees = 0;

        #Return all 0 except for total employees as no date is selected.
        return array($totalEmployees, $ontimeEmployees, $lateEmployees, $absentEmployees);
    }

    #Function
    public function getAttendanceStatsOnDate($date) {
        #Declare vars.
        $totalEmployees = 0;
        $ontimeEmployees = 0;
        $lateEmployees = 0;
        $absentEmployees = 0;

        $employeeList = array();

        #Get Total Employee Count.
        $eqQuery = "SELECT employees.id AS employeeID FROM employees WHERE employees.role <> 1;";
        $eqResultSet = $this->dbController->runQuery($eqQuery);

        if(!empty($eqResultSet)) {
            foreach($eqResultSet as $value) {
                $employeeList[] = $value["employeeID"];
            }
            $totalEmployees = count($employeeList);
        }

        #Get General Attendance Data For Selected Date
        $selectedDate = (new DateTime($date))->format('Y-m-d');
        $limiterDate = ((new DateTime($date))->add(new DateInterval('P1D')))->format('Y-m-d');

        $aeQuery = "
SELECT 
    attendance.timecode AS attTime,
    attendance.employeeID, 
    departments.workStart 
FROM iotp.attendance 
JOIN employees ON attendance.employeeID = employees.id 
JOIN roles ON employees.role = roles.id 
JOIN departments ON roles.department = departments.id 
WHERE timecode >= '$selectedDate' AND timecode < '$limiterDate' 
ORDER BY timecode DESC
";

        $aeResultSet = $this->dbController->runQuery($aeQuery);

        //Variable Declarations
        require_once("model/employee/attendance/AttendanceStat.class.php");
        $attendanceStatsArray = array();

        if(!empty($aeResultSet)) {
            foreach($aeResultSet as $value) {
                $currentAttStat = new AttendanceStat();

                //Fill Data
                #Employee ID
                $currentAttStat->setEmployeeID($value["employeeID"]);

                #Att Time
                $currentAttStat->setAttTime(strtotime(substr($value["attTime"], 11, 8)));

                #Work Start Time
                $currentAttStat->setWorkStart(strtotime($value["workStart"]));

                #Input into array.
                $attendanceStatsArray[] = $currentAttStat;
            }
        }

        #Begin Count
        foreach($attendanceStatsArray as $currentValue) {
            $currentInterval = $currentValue->getAttTime() - $currentValue->getWorkStart();

            #Count ONTIME Employees
            #If interval <= 0
            if($currentInterval <= 0) {
                $ontimeEmployees++;
            }

            #Count LATE Employees
            #If interval > 0 && interval <= 10800 (3 hrs)
            else if($currentInterval > 0 and $currentInterval <= 10800) {
                $lateEmployees++;
            }

            #Count ABSENT Employees
            #If interval > 10800 (>3hrs)
            else {
                $absentEmployees++;
            }
        }

        #Look for missing employees (who did not check-in at all)...
        #These get counted as absent too.
        //Declare Array
        $attendingEmployeesList = array();

        //Transfer Employee ID from array of objects into a simple array of numbers.
        foreach($attendanceStatsArray as $value) {
            $attendingEmployeesList[] = $value->getEmployeeID();
        }

        //Compare the differential size between 'WHAT SHOULD' and 'WHAT IS'.
        $absentEmployees = $absentEmployees + (count(array_diff($employeeList, $attendingEmployeesList)));


        #Return an array of the processed data.
        return array($totalEmployees, $ontimeEmployees, $lateEmployees, $absentEmployees);
    }

    #Function
    public function getAttendanceStatOfEmployee($employeeID) {
        #Declare vars.
        $ontimeCount = 0;
        $lateCount = 0;
        $absentCount = 0;

        require_once("model/employee/attendance/AttendanceStat.class.php");
        $attendanceStatsArray = array();

        #DB Query
        $query = "
SELECT
    attendance.timecode AS attTime,
    attendance.employeeID,
    departments.workStart
FROM iotp.attendance
JOIN employees ON attendance.employeeID = employees.id
JOIN roles ON employees.role = roles.id
JOIN departments ON roles.department = departments.id
WHERE employeeID = $employeeID
ORDER BY attTime ASC;
        ";

        $resultSet = $this->dbController->runQuery($query);

        #Get ATT STAT Data for counting.
        if(!empty($resultSet)) {
            foreach($resultSet as $value) {
                $currentAttStat = new AttendanceStat();

                //Fill Data
                #Att Date
                $currentAttStat->setAttDate(substr($value["attTime"], 0, 10));

                #Att Time
                $currentAttStat->setAttTime(strtotime(substr($value["attTime"], 11, 8)));

                #Work Start Time
                $currentAttStat->setWorkStart(strtotime($value["workStart"]));

                #Input into array.
                $attendanceStatsArray[] = $currentAttStat;
            }
        }

        #Begin Counting.
        foreach($attendanceStatsArray as $currentValue) {
            $currentInterval = $currentValue->getAttTime() - $currentValue->getWorkStart();

            #Count ONTIME
            #If interval <= 0
            if($currentInterval <= 0) {
                $ontimeCount++;
            }

            #Count LATE
            #If interval > 0 && interval <= 10800 (3 hrs)
            else if($currentInterval > 0 and $currentInterval <= 10800) {
                $lateCount++;
            }

            #Count ABSENT
            #If interval > 10800 (>3hrs)
            else {
                $absentCount++;
            }
        }

        #Look for missing days (employee did not check-in at all)...
        #These get counted as absent too.
        //Declare array of workdays.
        $weekdaysList = $this->getWorkDaysSince('2022-06-01');

        //Declare array of actual attending days.
        $attendingDaysList = array();
        foreach($attendanceStatsArray as $value) {
            $attendingDaysList[] = $value->getAttDate();
        }


        //Compare the differential size between 'WHAT SHOULD' and 'WHAT IS'.
        $differential = count(array_diff($weekdaysList, $attendingDaysList));
        $absentCount = $absentCount + $differential;


        #Return an array of the processed data.
        return array($ontimeCount, $lateCount, $absentCount);
    }

    #Returns a list of days that are NOT Saturdays or Sundays (Weekends).
    private function getWorkDaysSince($sinceDate) {
        $startDate = new DateTime($sinceDate);
        $endDate = new DateTime(date("Y-m-d", time()));

        #1-Day Interval
        $interval = new DateInterval("P1D");

        $listOfDates = array();

        foreach(new DatePeriod($startDate, $interval, $endDate->add($interval)) as $currentDay) {
            $currentDayNumber = $currentDay->format("N");

            if($currentDayNumber < 6){ //Check if it's a weekday.
                $listOfDates[] = $currentDay->format("Y-m-d");
            }
        }

        return $listOfDates;
    }

}