<?php

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->userModel = $this->model("user");
    }

    public function login($payload)
    {
        $data = [
            "email" => $_POST["email"],
            "error" => "Foutieve inlog"
        ];

        $result = $this->userModel->authenticate($payload["email"], $payload["password"]);

        $email = $result["email"];
        $roles = explode(",", $result["name"]);

        if ($email != null) {
            Application::$app->session->set("user", $email);
            Application::$app->session->set("roles", $roles);
            Application::$app->session->set("activeRole", $roles[0]);
            $this->redirect("/overzicht");
        } else {
            $this->view("user/login", $data);
        }
    }

    public function logout()
    {
        Application::$app->session->destroy();
        echo "logged out";
    }
}
