<?php

class ExceptionController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function _404() {
        $this->view("exception/404");
    }

    public function _405() {
        $this->view("exception/405");
    }
}