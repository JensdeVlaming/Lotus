<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// Base URL
$app->router->get("/", [ViewController::class, "index"]);

$app->router->get("/mail", [MailController::class, "mail"]);

// Authentication
$app->router->get("/inloggen", [ViewController::class, "login"]);
$app->router->post("/inloggen", [AuthController::class, "login"]);

// Register
$app->router->get("/registreren", [ViewController::class, "register"]);
$app->router->post("/registreren", [RegisterController::class, "register"]);

$app->router->get("/uitloggen", [AuthController::class, "logout"]);

// Overviews
$app->router->get("/overzicht", [OverviewHandler::class, "getOverview"]);

// Coordinator opdracht in behandeling nemen
$app->router->get("/opdracht/:id/behandelen", [CoordController::class, "AssignmentInProgress"]);
// Coordinator opdracht afwijzen
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
// Coordinator opdracht accepteren
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);

// Coordinator lid toewijzen aan opdracht
$app->router->get("/opdracht/:id/:email/toewijzen", [CoordController::class, "assignMemberToAssigment"]);
// Coordinator lid afwijzen aan opdracht
$app->router->get("/opdracht/:id/:email/afwijzen", [CoordController::class, "declineMemberFromAssigment"]);
// Coordinator lid verwijderen aan opdracht nadat hij/zij is toegewezen
$app->router->get("/opdracht/:id/:email/verwijderen", [CoordController::class, "deleteMemberFromAssigment"]);

// Overzicht van alle opdrachten
$app->router->get("/opdrachten", [MemberController::class, "getRegisteredOverview"]);
// Lid aanmelden voor opdracht
$app->router->get("/opdracht/:id/aanmelden", [MemberController::class, "participateAssignment"]);
// Lid afmelden van opdracht
$app->router->post("/opdracht/afmelden", [MemberController::class, "unsubscribeFromAssignment"]);
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

$app->router->get("/opdracht/:id/wijzigen", [ClientController::class, "editRequest"]);

$app->router->get("/opdracht/:id/formulier", [PdfController::class, "createInvoice"]);


// Requests
$app->router->get("/opdracht/aanvragen", [ViewController::class, "addRequest"]);
$app->router->post("/opdracht/aanvragen", [RequestController::class, "addRequest"]);
// Opdracht annuleren door opdrachtgever
$app->router->get("/opdracht/:id/annuleren", [ClientController::class, "cancelRequest"]);

// Role in applicatie aanpassen
// Details
$app->router->get("/opdracht/:id/details", [AssigmentDetailsHandler::class, "getDetails"]);
$app->router->get("/opdracht/:id/details-lid-assigned", [MemberController::class, "getRequestDetailsAssigned"]); // Kasper, Jens nakijken
$app->router->get("/lid/:email/details", [CoordController::class, "getMemberAndRequestDetails"]);
$app->router->get("/profiel", [ProfileHandler::class, "getProfile"]);
// $app->router->post("/profiel", [ProfileHandler::class, "editProfile"]);
$app->router->get("/profiel/wijzigen", [ProfileHandler::class, "getProfileInfo"]);
$app->router->get("/profiel/wijzig", [ProfileHandler::class, "goEditPassword"]);
$app->router->post("/profiel/wijzigen", [ProfileHandler::class, "editProfile"]);
$app->router->post("/profiel/wijzig", [ProfileHandler::class, "editPassword"]);


// Requests
$app->router->post("/role/:role", [AuthController::class, "changeActiveRole"]);
$app->router->get("/pdf", [PdfController::class, "__construct"]);


// POST Requests
$app->router->post("/inloggen", [AuthController::class, "login"]);
$app->router->post("/opdracht/aanvragen", [RequestController::class, "addRequest"]);
$app->router->post("/opdracht/:id/wijzigen", [RequestController::class, "editRequest"]);
$app->router->post("/role/change", [AuthController::class, "changeActiveRole"]);

// Exceptions
$app->router->notFoundHandler([ExceptionController::class, "_404"]);

?>

