<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// Base URL
$app->router->get("/", [ViewController::class, "index"]);

// Authentication
$app->router->get("/inloggen", [ViewController::class, "login"]);
$app->router->post("/inloggen", [AuthController::class, "login"]);

$app->router->get("/uitloggen", [AuthController::class, "logout"]);

// Overviews
$app->router->get("/overzicht", [OverviewHandler::class, "getOverview"]);

// Coordinator opdracht in behandeling nemen
$app->router->get("/opdracht/:id/behandelen", [CoordController::class, "AssigmentInProgress"]);
// Coordinator opdracht afwijzen
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);

// Coordinator lid toewijzen aan opdracht
$app->router->get("/opdracht/:id/:email/toewijzen", [CoordController::class, "assignMemberToAssigment"]);
// Coordinator lid verwijderen aan opdracht
$app->router->get("/opdracht/:id/:email/verwijderen", [CoordController::class, "deleteMemberFromAssigment"]);

// Overzicht van alle opdrachten
$app->router->get("/opdrachten", [MemberController::class, "getRegisteredOverview"]);
// Lid aanmelden voor opdracht
$app->router->get("/opdracht/:id/aanmelden", [MemberController::class, "participateAssignment"]);
// Lid afmelden van opdracht
$app->router->post("/opdracht/afmelden", [MemberController::class, "deregister"]);
// Details van opdracht
$app->router->get("/opdracht/:id/details", [AssigmentDetailsHandler::class, "getDetails"]);
// NAKIJKEN? KAN DIT WEG?
$app->router->get("/opdracht/:id/details-lid-assigned", [MemberController::class, "getRequestDetailsAssigned"]); // Kasper, Jens nakijken

// Overzicht van alle leden 
$app->router->get("/leden", [CoordController::class, "getRegistry"]);
// Details van lid
$app->router->get("/lid/:email/details", [CoordController::class, "getMemberAndRequestDetails"]);
// Formulier om lid aan te maken
$app->router->get("/leden/aanmaken", [CoordController::class, "addMember"]);
$app->router->post("/leden/aanmaken", [CoordController::class, "createMember"]);

// Opdracht indienen door opdrachtgever
$app->router->get("/opdracht/aanvragen", [ViewController::class, "addRequest"]);
$app->router->post("/opdracht/aanvragen", [RequestController::class, "addRequest"]);
// Opdracht annuleren door opdrachtgever
$app->router->get("/opdracht/:id/annuleren", [ClientController::class, "cancelRequest"]);

// Role in applicatie aanpassen
$app->router->post("/role/change", [AuthController::class, "changeActiveRole"]);

// Exceptions
$app->router->notFoundHandler([ExceptionController::class, "_404"]);

?>

