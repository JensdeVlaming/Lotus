<?php
    require_once "./../../database/dhb.inc.php";

    // WHERE clientEmail = &_SESSION["clientEmail"]

    $sql = "SELECT * FROM  request";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // fetch data of each row 
        while($row = mysqli_fetch_assoc($result)) {
            $isApproved;
            if ($row["approved"] == 1) {
                $isApproved = "checkmark";
            } else if ($row["approved"] == 0) {
                $isApproved ="xmark";
            }
        // card skeleton - fetched data is added in according spots and printed
            echo '<div class="card shadow-lg m-3 mx-auto" style="width: 30rem;">
            <div class="row m-2 ">
                <div class="col-md-3">
                    <div class="card-det">
                    <h3 style="height:100px">'. $row["clientEmail"].'</h3>
                    <h4>'. $row["playDate"].'</h4>
                    <h4>'. $row["playGround"].'</h4>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card-map"> 
                        <div id="map-container-google-1" class="z-depth-1-half map-container border" style="height: 160px">
                        <iframe src="https://maps.google.com/maps?q='. $row["playGround"].'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                            style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card-approval">
                        <p>Geaccepteerd door coördinator: <img src="/src/img/'.$isApproved.'.png" class="img-thumbnail" alt="..."></p>
                    </div>
                </div>
            </div>
        </div>';

        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
?>