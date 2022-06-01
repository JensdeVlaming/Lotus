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
            $embed = "&t=&z=13&ie=UTF8&iwloc=&output=embed";
            if(isset($_POST['requests'])) {
                header("location: ../client/opdrg.home.php"); }

            if(isset($_POST['newReq'])) {
                header("location: ../client/newReq.php");
            }
        ?>

        <section class="container text-center">
            <form method="POST">
                <input type="submit" class="btn btn-outline-primary btn-lg" name="requests" value="Jouw opdrachten">
                <input type="submit" class="btn btn-outline-dark btn-lg" name="newReq" value="Nieuwe opdrachten">
            </form>
            <hr class="dropdown-divider">
        </section>

        <section class='container cards'>
            <?php 
                foreach($data as $item) {
            
                    $isApproved = "xmark";
                    if ($item["approved"] == 1) {
                        $isApproved = "checkmark";
                    }
            ?>

            <div class="card shadow-lg m-3 mx-auto" style="width: 30rem;">
                <div class="row m-2 ">
                    <div class="col-md-3">
                        <div class="card-det">
                        <h6 style="height:100px"><?php echo "". $item["requestName"].""?></h6></br></br>
                        <p><?php echo "". $item["playDate"].""?></br><?php echo "". $item["playCity"].""?></p>
                        
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card-map"> 
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 160px">
                            <iframe src="https://maps.google.com/maps?q=<?php echo "".$item["playCity"]."+".$item["playStreet"]."+".$item["playPremise"]."+".$item["playPCode"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-approval">
                            <p>Geaccepteerd door coördinator: <img src="/src/img/<?php echo "".$isApproved.""?>.png" class="img-thumbnail" alt="..."></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                }
            ?>
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