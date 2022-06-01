<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

// GET Requests
Route::get("/login", [ViewController::class, "login"]);
Route::get("/overview", function(){
    MemberController::showAssignmentOverview;
});


// POST Requests
Route::post("/login", [[UserController::class, "login"], ]);

// Route::get("/login/:id", function(){
//     // UserController::view("/user/login");
// });

// Route::post("/login", function($payload){
//     UserController::login($payload);
// });

// Route::get("/authenticated", function(){
//     "Logged in!";
// });

?>