<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="src/css/styles.css">

    <!-- APPROOT file create so a variable can be here below! -->
    <title>Lotus</title>
</head>

<body>

    <nav>
        <div class="wrapper">
            <a href="index.php"></a>
            <ul>
         
            </ul>
        </div>
    </nav>

    <div class="wrapper">

    <?php 
         if(isset($_POST['solicit'])) {
          
            // $conn = mysqli_connect($servername, $username, $password,$db);
            //  $_SESSION["request"] & $_SESSION["userId"]
            // $_SESSION["userEmail"]
            // $sqlAlreadySolicit = "SELECT * FROM solicit WHERE requestId = 10 AND email = 'kasper@lotus.nl';";
            // $sqlAlreadySolicitResult = mysqli_query($conn, $sqlAlreadySolicit);
    
            // if (mysqli_num_rows($sqlAlreadySolicitResult) > 0) { 
            //   echo '<script> alert("Je bent al aangemeld voor deze opdracht!")</script>';
            // } else {
            //   // $sqlSolicit = "INSERT INTO solicit VALUES (".$row["requestId"].",20);";
            //   echo '<script> alert("Jij bent aangemeld voor deze opdracht!")</script>';
            // }
            echo"solicit button is called";
        }
    ?>
        <section class="details">
            <div class="container border shadow-lg rounded-3" style="width: 50%;">
                <div class="det-req">

                    <h1><?php echo "".$data['companyName'].""?> </h1>
                    <p class="lead"><?php echo "".$data['summary'].""?> </p>
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
                        <td><?php echo "".$data["playDate"].""?></td>
                        </tr>
    
                        <tr>
                        <td scope="row">PlayTime</td>
                        <td><?php echo "".$data["playTime"].""?></td>
                        </tr>
    
                        <tr>
                        <td scope="row">PlayGround</td>
                        <td><?php echo "".$data["playGround"].""?></td>
                        </tr>
    
                        <tr>
                        <td scope="row">Leden nodig</td>
                        <td><?php echo "".$data["lotusCasualties"].""?></td>
                        </tr>
                    </table>
                    </p>';
    
            <!-- // echo gegevens opdrachtgever -->
            <h2>Gegevens opdrachtgever</h2>
                <p>
                <?php echo "".$data["firstName"].' '.$data["lastName"].' </br>
                '.$data["clientEmail"].' </br>
                '.$data["phonenumber"].""?>
                </p>
            
    
    
            <!-- if comments is filled echo comments header and info -->
            <?php
            if (!empty($data["comments"])) {
            echo '<h2>Opmerkingen</h2>
                    <p> '.$data["comments"].'</p>';
            }
            ?>
                
            <!-- // echo google maps -->
            <hr class="dropdown-divider">
                <h2>Google Maps</h2>
                <p>
                <iframe src="https://maps.google.com/maps?q=<?php echo "".$data["playGround"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                    style="border:0" allowfullscreen></iframe>
                </p>
                


                </div>
            </div>
        </section>
    </div>
</body>
    <script 
        type="text/javascript" 
        src="./src/js/app.js"
    >
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"
    >
    </script>
    <script 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    >
    </script>
</html>