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
<<<<<<< HEAD
            $this->redirect("/overzicht-opdrachtgever");
=======
            Application::$app->session->set("roles", $roles);
            Application::$app->session->set("activeRole", $roles[0]);
            $this->redirect("/overzicht");
>>>>>>> 5373770d8314b53ff07081e47fb56cfdf229cff5
        } else {
            $this->view("user/login", $data);
        }
    }

    public function changeActiveRole($data)
    {
        $role = $data["role"];
        $url = $data["destination"];

        Application::$app->session->set("activeRole", $role);

        $this->redirect("$url");

    }


    public function logout()
    {
        Application::$app->session->destroy();
        echo "logged out";
    }
}
