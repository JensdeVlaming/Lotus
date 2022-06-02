<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

// GET Requests
Route::get("/login", [ViewController::class, "login"]);
Route::get("/overview", [MemberController::class, "showAssignmentOverview"]);
Route::get("/coordoverview", [CoordController::class, "showRequestOverview"]);

// POST Requests
Route::post("/login", [[UserController::class, "login"], ]);
Route::post("/coordoverview", [CoordController::class, "acceptAssignment"]);
Route::post("/coordoverview", [CoordController::class, "declineAssignment"]);

// Route::get("/login/:id", function(){
//     // UserController::view("/user/login");
// });

// Route::post("/login", function($payload){
//     UserController::login($payload);
// });

// Route::get("/authenticated", function(){
//     "Logged in!";
// });
