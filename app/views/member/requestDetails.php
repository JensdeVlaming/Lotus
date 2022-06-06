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

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- APPROOT file create so a variable can be here below! -->
    <title>Lotus</title>
</head>

<body>
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
        // print_r($data);
    ?>
        
            <div class="container-sm m-auto border shadow-lg rounded-3" >
                <div class="row gx-5">
                    <div class="col col-12 col-md-auto">
                        <h2>CompanyName temp</h2>
                        
                        <hr class="dropdown-divider">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Details</th>
                                    <th scope="col">Info</th>
                                    </tr>
                                </thead>
                                    <tr>
                                    <td scope="row">PlayDate</td>
                                    <td><?php echo "date"?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayTime</td>
                                    <td><?php echo "date"?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayGround</td>
                                    <td><?php echo "date"?></td>
                                    </tr>

                                    
                                    <tr>
                                    <td scope="row">GrimeGround</td>
                                    <td>
                                        <?php echo "date"?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Leden nodig</td>
                                    <td><?php echo "date"?></td>
                                    </tr>
                            </table> 

                    </div>
                    <div class="col col-12 col-md-auto">
                        <hr class="dropdown-divider">
                        <!-- // echo gegevens opdrachtgever -->
                        <h2>Gegevens opdrachtgever</h2>

                        <hr class="dropdown-divider">
                        <h2>Google Maps</h2>
                            <iframe src="https://maps.google.com/maps?q=Breda+Heinoord+7+4824LT?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>
       
    
</body>
    <script 
        type="text/javascript" 
        src="./src/js/app.js"
    >
    </script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsmsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"
    >
    </script>
    <script 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
    >
    </script>
</html>