<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

Route::get("/login", function(){
    UserController::view("/user/login");
});

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

?>