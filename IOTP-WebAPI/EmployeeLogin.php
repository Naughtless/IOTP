<?php

require_once("model/account/employeeAccount/EmployeeAccountHandler.class.php");
require_once("model/account/Account.class.php");

$accountHandler = new EmployeeAccountHandler();


$data = null;

if(isset($_POST['username']) AND isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    #Login Attempt
    if($accountHandler->login($username, $password)) {
        $accountData = $accountHandler->getAccount();

        $data = array(
            "username" => $accountData->getUsername(),
            "password" => $accountData->getPassword(),
            "employeeID" => $accountData->getEmployeeID(),
            "employeeName" => $accountData->getEmployeeName(),
            "employeeRole" => $accountData->getRole()
        );
    }
    else {
        $data = array(
            "ERROR:" => "Incorrect credentials!"
        );
    }
}
else {
//    $username = 'fredella';
//    $password = 'fredelol';
//
//
//    #Login Attempt
//    if($accountHandler->login($username, $password)) {
//        $accountData = $accountHandler->getAccount();
//
//
//        $data = array(
//            "username" => $accountData->getUsername(),
//            "password" => $accountData->getPassword(),
//            "employeeID" => $accountData->getEmployeeID(),
//            "employeeName" => $accountData->getEmployeeName(),
//            "employeeRole" => $accountData->getRole()
//        );
//    }
//    else {
//        $data = array(
//            "ERROR:" => "Incorrect credentials!"
//        );
//    }

    $data = array(
        "ERROR:" => "Credentials not set!"
    );
}


echo json_encode($data);

//file_put_contents("data.json", json_encode($data));

?>