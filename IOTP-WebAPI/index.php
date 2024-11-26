<?php

//Controller Loader
function loadController($selectedController) {
    switch($selectedController) {
        case 'DashboardController':
            require_once("viewpages/dashboard/DashboardController.class.php");
            return new DashboardController();
        case 'RequestsController':
            require_once("viewpages/requests/RequestsController.class.php");
            return new RequestsController();
        case 'EmployeesController':
            require_once("viewpages/employee/EmployeesController.class.php");
            return new EmployeesController();
        case 'LoginController':
            require_once("viewpages/login/LoginController.class.php");
            return new LoginController();
        default:
            require_once("viewpages/about_us/AboutUsController.class.php");
            return new AboutUsController();
    }
}

//Controller caching.
/*
Unless the user closes the tab, controller shouldn't reset on reload.
 */
if(isset($_COOKIE['userSession'])){
    $cachedController = $_COOKIE['userSession'];
}
else {
    $cachedController = null;
}

//Controller Selector
if(isset($_GET['controller'])) {
    setcookie('userSession', $_GET['controller'], 0);
    $controller = loadController($_GET['controller']);
}
else {
    $controller = loadController($cachedController);
}

$controller->invoke();