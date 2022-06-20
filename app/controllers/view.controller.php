<?php
class ViewController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            "title" => "<h1>CONTENT HIER</h1>"
        ];

        $this->view("index", $data);
    }

    public function login() {
        $this->viewContentOnly("user/login");
    }

    public function register() {
        $this->viewContentOnly("user/register");
    }

    public function addRequest() {
        $this->view("/addRequest");
    }
}