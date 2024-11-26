<?php

abstract class Controller {

    //Constructor
    abstract public function __construct();

    //Standard Invoker
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

    //Action Runner
    abstract protected function run($action);

    //Page Loader
    abstract protected function reload();
}