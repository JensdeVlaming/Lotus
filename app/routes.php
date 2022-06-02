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
$app->router->get("/opdracht/:id/afwijzen", [CoordController::class, "declineAssignment"]);
$app->router->get("/opdracht/:id/accepteren", [CoordController::class, "acceptAssignment"]);


// POST Requests
$app->router->post("/login", [AuthController::class, "login"]);
<<<<<<< HEAD

$app->router->get("/requests", [ClientController::class, "requests"]);
$app->router->get("/overzicht", [ClientController::class, "overview"]);

$app->router->get("/requestDetails", [MemberController::class, "requestDetails"]);

$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>




=======
$app->router->get("/overzicht", [ClientController::class, "overview"]);
$app->router->notFoundHandler([ExceptionController::class, "_404"]);
?>
>>>>>>> 24b8c92678babfc3602175d7ceecc7f10f8d985f
