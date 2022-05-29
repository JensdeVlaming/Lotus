<?php 

if (isset($_POST["submit"])) {
        
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    // error handlers
    if (emptyIntputSignup($name,$email,$password,$pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidName($name) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (invalidpassword($password) !== false) {
        header("location: ../signup.php?error=invalidpassword");
        exit();
    }

    if (pwdMatch($email,$pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExist($conn, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    // no errors
    createUser($conn, $name, $email, $password);

} else {
    header("location: ../signup.php" );
    exit();
}