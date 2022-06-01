<?php 
function getRequestDetails($conn) {
    $sql = "SELECT  FROM request WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../lid.ovrz.opdr.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s",$id);
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