<?php

class AuthController extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("user");
        $this->registerMiddleware(new AuthMiddleware(["changeActiveRole", "logout"]));
        
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
        } else {
            $this->viewContentOnly("user/login", $data);
        }
    }

    public function changeActiveRole($data)
    {
        $role = $data["role"];
        $url = $data["destination"];

        Application::$app->session->set("activeRole", $role);

        $this->redirect("/overzicht");
    }

    public function register()
    {
        $this->view("user/register");
    }
 
    public function logout()
    {
        Application::$app->session->destroy();
        $this->redirect("/inloggen");
    }
}
