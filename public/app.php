<?php

require_once(dirname(__FILE__) . "/protected/private/controllers/user.controller.php");
require_once(dirname(__FILE__) . "/protected/private/models/user.model.php");

if (isset($_REQUEST["req"]) && $_REQUEST["req"]) {
    $req = $_REQUEST["req"];
} else {
    echo "Not allowed.";
    exit;
}

$userController = new UserController();

echo dirname(__FILE__);

switch($req) {
    case "login":
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($userController->login($email, $password)) {
            header("Location:overview");
        } else {
            header("Location:login?err=1");
        }
}