<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// GET Requests

// Base URL
$app->router->get("/", [ViewController::class, "index"]);

// Authentication
$app->router->get("/login", [ViewController::class, "login"]);
$app->router->get("/uitloggen", [AuthController::class, "logout"]);

// Overviews
$app->router->get("/overzicht-lid", [MemberController::class, "getOverview"]);
$app->router->get("/overzicht-coordinator", [CoordController::class, "getOverview"]);
$app->router->get("/overzicht-opdrachtgever", [ClientController::class, "getOverview"]);

// Assigments
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);

// Requests
$app->router->get("/addRequest", [ViewController::class, "addRequest"]);



// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->post("/addRequest", [RequestController::class, "addRequest"]);

// Exceptions

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>
