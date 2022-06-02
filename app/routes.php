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
$app->router->get("/overview", [MemberController::class, "showAssignmentOverview"]);
$app->router->get("/coordoverview", [CoordController::class, "showRequestOverview"]);

// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->post("/coordoverview", [CoordController::class, "acceptAssignment"]);
$app->router->post("/coordoverview", [CoordController::class, "declineAssignment"]);
$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>
