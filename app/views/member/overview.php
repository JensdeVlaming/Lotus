<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="src/css/styles.css">


    <title><?php echo SITENAME ?> | Opdracht aanvragen</title>
</head>

<body>
    <section>
        <section class="container text-center mt-1">
            <form method="POST">
                <input type="submit" class="btn btn-outline-primary btn-lg" name="requests" value="Jouw opdrachten">
                <input type="submit" class="btn btn-outline-dark btn-lg" name="newReq" value="Nieuwe opdrachten">
            </form>
            <hr class="dropdown-divider">

        </section>

        <?php foreach ($data as $item) { ?>
            <div class="card shadow-lg m-3 mx-auto" style="width: 32rem;">
                <div class="row m-2 ">
                    <div class="col-md-3">
                        <div class="card-det">
                            <h5><?php echo "" . $item["requestName"] . "" ?></h3>
                                <h6><?php echo "" . $item["playDate"] . "" ?></h4>
                                    <h6><?php echo "" . $item["playGround"] . "" ?></h4>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card-map">
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 160px">
                                <iframe src="https://maps.google.com/maps?q=<?php echo "" . $item["playGround"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-registration text-center">
                            <button class="btn btn-success">Inschrijven </button>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        </div>
        </div>
    </section>
</body>