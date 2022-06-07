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
$app->router->get("/opdracht/:id/aanmelden", [MemberController::class, "participateAssignment"]);
$app->router->get("/opdracht/:id/afmelden", [MemberController::class, "unsuscribeAssignment"]);

// Details
$app->router->get("/opdracht/:id/details-lid", [MemberController::class, "getRequestDetails"]);
$app->router->get("/opdracht/:id/details-lid-assigned", [MemberController::class, "getRequestDetailsAssigned"]);
$app->router->get("/opdracht/:id/details-coordinator-accept-deny", [CoordController::class, "getRequestDetailsAcceptDeny"]);

// Requests
$app->router->get("/addRequest", [ViewController::class, "addRequest"]);
$app->router->get("/opdracht/:id/annuleren", [ClientController::class, "cancelAssignment"]);

// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->post("/addRequest", [RequestController::class, "addRequest"]);

// Exceptions

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>

