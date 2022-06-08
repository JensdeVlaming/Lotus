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
$app->router->get("/overzicht-lid-ingeschreven", [MemberController::class, "getRegisteredOverview"]);

// Assigments
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);
$app->router->get("/opdracht/:id/aanmelden", [MemberController::class, "participateAssignment"]);
$app->router->get("/opdracht/:id/afmelden", [MemberController::class, "unsuscribeAssignment"]);
$app->router->get("/leden", [CoordController::class, "getRegistry"]);




// Details
$app->router->get("/opdracht/:id/details-lid", [MemberController::class, "getRequestDetails"]);
$app->router->get("/opdracht/:id/details-lid-assigned", [MemberController::class, "getRequestDetailsAssigned"]);
$app->router->get("/opdracht/:id/details-coordinator", [CoordController::class, "getRequestDetailsAcceptDeny"]);
$app->router->get("/opdracht/:id/details-client", [ClientController::class, "getRequestDetails"]);
$app->router->get("/member/:email/details", [CoordController::class, "getMemberDetails"]);

// Requests
$app->router->get("/opdracht/aanvragen", [ViewController::class, "addRequest"]);

$app->router->post("/role/:role", [AuthController::class, "changeActiveRole"]);



// POST Requests
$app->router->post("/inloggen", [AuthController::class, "login"]);

$app->router->post("/addRequest", [RequestController::class, "addRequest"]);

// Exceptions

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>

