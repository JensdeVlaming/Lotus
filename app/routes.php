<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// GET Requests

// Base URL
$app->router->get("/", [ViewController::class, "index"]);

// Authentication
$app->router->get("/inloggen", [ViewController::class, "login"]);
$app->router->get("/uitloggen", [AuthController::class, "logout"]);

// Overviews
$app->router->get("/overzicht", [OverviewHandler::class, "getOverview"]);

// Assigments
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);
$app->router->get("/opdracht/:id/aanmelden", [MemberController::class, "participateAssignment"]);

// Requests
$app->router->get("/opdracht/aanvragen", [ViewController::class, "addRequest"]);



// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->post("/addRequest", [RequestController::class, "addRequest"]);

// Exceptions

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>
