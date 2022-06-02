<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// GET Requests
$app->router->get("/", [ViewController::class, "index"]);
$app->router->get("/login", [ViewController::class, "login"]);
$app->router->get("/uitloggen", [AuthController::class, "logout"]);
$app->router->get("/authenticated", [UserController::class, "authenticatd"]);

// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->get("/requests", [ClientController::class, "requests"]);
$app->router->get("/overzicht", [ClientController::class, "overview"]);

$app->router->get("/requestDetails", [MemberController::class, "requestDetails"]);

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>




