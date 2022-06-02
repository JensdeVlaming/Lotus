<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    // error handlers
    if (emptyIntputLogin($email,$password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    // no errors
    loginUser($conn, $email, $password);

} else {
    header("location: ../login.php");
}
