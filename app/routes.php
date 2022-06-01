<?php

foreach (glob("../app/controllers/*.controller.php") as $filename) {
    require_once($filename);
}

// GET Requests
Route::get("/login", [ViewController::class, "login"]);

// POST Requests
Route::post("/login", [AuthController::class, "login"]);

?>