<?php

require_once("abstract/Controller.class.php");

class AboutUsController
    extends Controller {

    /*
     * Constructor
     */
    public function __construct() {
    }

    /*
     * Standard Invoker
     */
    public function invoke() {
        if(isset($_GET['action'])) {
            $this->run($_GET['action']);
        }
        else if(isset($_POST['action'])) {
            $this->run($_POST['action']);
        }
        else {
            $this->reload();
        }
    }

    /*
     * Action Runner
     */
    protected function run($action) {
        switch($action) {
            case "startDemo":
                header("location: index.php?controller=LoginController");
                exit();
        }
    }


    /**
     * Operational Functions
     */
    #Reload
    protected function reload() {
        #Load Page
        include("viewpages/about_us/viewAboutUs.php");
    }
}