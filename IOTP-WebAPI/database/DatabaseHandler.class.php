<?php

class DatabaseHandler {
    /*
     * Properties
     */
    private $connection;

    /*
     * Constructor
     */
    public function __construct() {
        require_once("database/credentials.php");

        $this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);

        if(!$this->connection) {
            die("ERROR: Database connection failed!");
        }
    }

    /*
     * Functions
     */
    public function runQuery($query) {
        $resultSet = mysqli_query($this->connection, $query);

        while(mysqli_next_result($this->connection)){}

        while($currentRow = mysqli_fetch_assoc($resultSet)) {
            $resultArray[] = $currentRow;
        }

        if(!empty($resultArray)) {
            return $resultArray;
        }
    }
    public function runQueryNoResult($query) {
        mysqli_query($this->connection, $query);
        while(mysqli_next_result($this->connection)){;}
    }
    public function runQuerySafeMode($query) {
        $safeConnection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_SCHEMA);
        mysqli_query($safeConnection, $query);
        $safeConnection->close();
    }
    public function runProcedure($query) {
        $resultSet = mysqli_query($this->connection, $query);
        mysqli_next_result($this->connection);
        while(mysqli_next_result($this->connection)){;}

        while($currentRow = mysqli_fetch_assoc($resultSet)) {
            $resultArray[] = $currentRow;
        }

        if(!empty($resultArray)) {
            return $resultArray;
        }
    }
}

?>
