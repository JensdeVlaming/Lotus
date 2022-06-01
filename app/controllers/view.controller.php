<?php
class ViewController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            "title" => "Home page"
        ];

        $this->view("index", $data);
    }

    public function login() {
        $this->view("user/login");
    }

    public function about() {
        $this->view("user/login");
    }
}