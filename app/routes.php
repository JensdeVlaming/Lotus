<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

// GET Requests
Route::get("/login", [ViewController::class, "login"]);

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

Route::get("/requests", [ClientController::class, "requests"]);

Route::get("/requestDetails", [MemberController::class, "requestDetails"]);
?>

