<?php
  require_once "./../../database/dhb.inc.php";

    // id must be taken from a session variable
    // $_SESSION["userId"]
    $sql = "SELECT * FROM request INNER JOIN member_account ON request.clientEmail=member_account.email WHERE id =20;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo '  <h1>title </h1>
                <p class="lead"> '.$row["summary"].'</p>
                <form method="POST">
                  <input type="submit" class="btn btn-warning" name="solicit" value="Aanmelden">
                </form>
                <hr class="dropdown-divider">
                <h2>Details</h2>
                <p>
                    <table class="table">
                    <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Info</th>
                    </tr>
                    </thead>
                    <tr>
                    <td scope="row">PlayDate</td>
                    <td>'.$row["playDate"].'</td>
                    </tr>

                    <tr>
                    <td scope="row">PlayTime</td>
                    <td>'.$row["playTime"].'</td>
                    </tr>

                    <tr>
                    <td scope="row">PlayGround</td>
                    <td>'.$row["playGround"].'</td>
                    
                    </tr>

                    <tr>
                    <td scope="row">Leden nodig</td>
                    <td>'.$row["lotusCasualties"].'</td>
                    
                    </tr>
                </table>
                </p>';

        // echo gegevens opdrachtgever
        echo '<h2>Gegevens opdrachtgever</h2>
              <p>
              '.$row["firstName"].' '.$row["lastName"].' </br>
              '.$row["clientEmail"].' </br>
              '.$row["phonenumber"].'
              </p>';
        


        //if comments is filled echo comments header and info
        if (!empty($row["comments"])) {
          echo '<h2>Opmerkingen</h2>
                <p> '.$row["comments"].'</p>';
        }
            
        // echo google maps
        echo '<hr class="dropdown-divider">
              <h2>Google Maps</h2>
              <p>
              <iframe src="https://maps.google.com/maps?q='. $row["playGround"].'&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                  style="border:0" allowfullscreen></iframe>
              </p>
              ';

      }
    } else {
      echo "No details were found";
    }

    mysqli_close($conn);

    if(isset($_POST['solicit'])) {
        require "./../../database/dhb.inc.php";
        // $conn = mysqli_connect($servername, $username, $password,$db);
        //  $_SESSION["request"] & $_SESSION["userId"]
        // $_SESSION["userEmail"]
        $sqlAlreadySolicit = "SELECT * FROM solicit WHERE requestId = 10 AND email = 'kasper@lotus.nl';";
        $sqlAlreadySolicitResult = mysqli_query($conn, $sqlAlreadySolicit);

        if (mysqli_num_rows($sqlAlreadySolicitResult) > 0) { 
          echo '<script> alert("Je bent al aangemeld voor deze opdracht!")</script>';
        } else {
          // $sqlSolicit = "INSERT INTO solicit VALUES (".$row["requestId"].",20);";
          echo '<script> alert("Jij bent aangemeld voor deze opdracht!")</script>';
        }
        mysqli_close($conn);
    }
?>