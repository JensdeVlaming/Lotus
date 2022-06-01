<?php

class AuthController extends Controller
{

    public static function login($payload)
    {
        $data = [
            "email" => $_POST["email"],
            "error" => "Foutieve inlog"
        ];

        $userModel = self::model("user");

        if ($userModel->authenticate($payload["email"], $payload["password"])) {
            self::view("index");
        } else {
            self::view("user/login", $data);
        }
    }

    public static function logout()
    {
        session_start();
        session_destroy();
    }
}
