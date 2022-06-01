<?php

class UserController extends Controller
{
    public static function index()
    {
        $data = [
            "title" => "Home page"
        ];

        self::view("index", $data);
    }

    // TODO implement roles
    public static function create($email, $password)
    {
    }

    public static function register($payload)
    {
        // TODO register user
    }

    public static function logout()
    {
        session_start();
        session_destroy();
    }

    public function test($payload)
    {
        print_r($payload);
    }
}
