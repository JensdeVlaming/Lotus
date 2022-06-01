<?php
    require_once "./../../database/dhb.inc.php";

    // WHERE clientEmail = &_SESSION["clientEmail"]

    $sql = "SELECT * FROM  request";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // fetch data of each row 
        while($row = mysqli_fetch_assoc($result)) {
            $isApproved;
            
        // card skeleton - fetched data is added in according spots and printed
           echo "data times found as rows of this line";

        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
?>