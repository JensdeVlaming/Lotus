<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

// GET Requests
Route::get("/login", [ViewController::class, "login"]);

<<<<<<< HEAD
// POST Requests
Route::post("/login", [AuthController::class, "login"]);
=======
Route::get("/addRequest", function(){
    UserController::view("/addRequest");
});

Route::get("/login/:id", function(){
    // UserController::view("/user/login");
});

Route::post("/login", function($payload){
    UserController::login($payload);
});

Route::get("/authenticated", function(){
    "Logged in!";
});
>>>>>>> fb46c58 (added javascript functions for the checkboxes)

?>