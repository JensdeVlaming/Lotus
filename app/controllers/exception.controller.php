<?php

class ExceptionController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function _404() {
        $this->viewContentOnly("exception/404");
    }

    public function _405() {
        $this->viewContentOnly("exception/405");
    }
}