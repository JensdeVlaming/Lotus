<?php require 'getOpenAssignments.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Website als opdracht" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
</head>

<body>
    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text"> .$row['requestName'] </p>
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div> -->

    <section class="nav-buttons">
    <button>Jouw opdrachten</button>
    <button>Nieuwe opdrachten</button>
</section>

    <section class='cards'>

    <?php 
    require_once "getAllYourRequests.php"
    ?>

    <!-- <div class="card" style="width: 30rem;">
        <div class="row m-2 ">
            <div class="col-md-3">
                <div class="card-det">
                <h3 style="height:100px">title</h3>
                <h4>06-01-2022</h4>
                <h4>Breda</h4>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card-map"> 
                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 160px">
                    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card-approval">
                    <p>Geaccepteerd door coördinator: <img src="/src/img/checkmark.png" class="img-thumbnail" alt="..."></p>
                </div>
            </div>
        </div>
    </div> -->

    </section>
</body>

</html>