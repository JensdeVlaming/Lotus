<?php
class RequestController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function addRequest() {
        $this->view("/addRequest");
    }
}