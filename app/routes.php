<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

$app = new Application();

// GET Requests
    // view & auth & user
$app->router->get("/", [ViewController::class, "index"]);
$app->router->get("/login", [ViewController::class, "login"]);
$app->router->get("/uitloggen", [AuthController::class, "logout"]);
$app->router->get("/authenticated", [UserController::class, "authenticatd"]);
    // member
$app->router->get("/overview", [MemberController::class, "showAssignmentOverview"]);
$app->router->get("/requestDetails", [MemberController::class, "requestDetails"]);
    // coord
$app->router->get("/coordoverview", [CoordController::class, "showRequestOverview"]);
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);
    // client
$app->router->get("/requests", [ClientController::class, "requests"]);
$app->router->get("/overzicht", [ClientController::class, "overview"]);



// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>

