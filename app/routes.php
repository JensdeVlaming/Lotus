<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

Route::get("/login", function(){
    UserController::view("/user/login");
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

Route::get("/requests", function(){
    ClientController::requests();
});
?>