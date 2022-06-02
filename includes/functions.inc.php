<?php
function emtptyInputSignup($name,$email,$password,$pwdrepeat) {
    $result;
    if (empty($name)||empty($email)||empty($password)||empty($pwdrepeat)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

function invalidName($name) {
    $result;
    if(preg_match("/^[a-zA-Z]*$/",$name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidpassword($password) {
    $result;
    if(preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)) {
        $result = true;
    } else { 
        $result = false;
    }
    return $result;
}

function pwdMatch($email,$pwdrepeat) {
    $result;
    if ($pwdrepeat !== $password) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExist($conn, $email) {
    $sql = "SELECT * FROM member_account WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    } 

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt); 

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $password) {
    $sql = "INSERT INTO account (email,roles) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=none");
        exit();
    } 

    $hashedPwd = password_hash($password);

    mysqli_stmt_bind_param($stmt,"ss",$email,"member");
    msqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);

}

function emptyIntputLogin($email,$password) {
    $result;
    if (empty($email)||empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn,$email,$password) {
    $uidExist = uidExist($conn,$email);

    if ($uidExist === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["pwd"];
    $checkPwd = password_verify($password,$pwdHashed);

    if ($checkPwd === false) {
        header("locatios: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userId"] = $uidExist["id"];

        header("location: ../index.php");
        exit();
    }

}