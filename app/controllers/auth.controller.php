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

        $email = $this->userModel->authenticate($payload["email"], $payload["password"]);

        if ($email != null) {
            Application::$app->session->set("user", $email);
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
