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

        if ($result != null) {
            $initials = $this->getInitials($result["firstName"], $result["lastName"]);
            $email = $result["email"];
            $roles = explode(",", $result["name"]);

            Application::$app->session->set("user", $email);
            Application::$app->session->set("initials", $initials);
            Application::$app->session->set("roles", $roles);
            Application::$app->session->set("activeRole", $roles[0]);
            $this->redirect("/overzicht");

        $initials = substr(explode(" ", $result["firstName"])[0], 0, 1) . substr(explode(" ", $result["lastName"])[0], 0, 1);

        if ($result != null) {
            Application::$app->session->set("user", $result["email"]);
            Application::$app->session->set("initials", $initials);
            $this->redirect("/overzicht-opdrachtgever");
        } else {
            $this->view("user/login", $data);
        }
    }
    }

    public function changeActiveRole($data) {
        $role = $data["role"];
        $url = $data["destination"];

        Application::$app->session->set("activeRole", $role);

        $this->redirect("$url");
    }


    public function logout()
    {
        Application::$app->session->destroy();
        $this->redirect("/inloggen");
    }
}
