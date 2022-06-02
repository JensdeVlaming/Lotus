<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title><?php echo SITENAME ?> | Opdrachten</title>
</head>

<body>
    <div class="container">
        <?php
        foreach ($data as $item) {

            if ($item["approved"] == 0) {
                $approved = '<span class="text-muted">Afgewezen:</span> <i class="fa fa-times text-danger" aria-hidden="true"></i>';
            } else if ($item["approved"] == 1) {
                $approved = '<span class="text-muted">Goedgekeurd:</span> <i class="fa fa-check text-success" aria-hidden="true"></i>';
            } else if ($item["approved"] == 2) {
                $approved = '<span class="text-muted">Wachtende:</span> <i class="fa fa-clock-o text-warning" aria-hidden="true"></i>';
            }
        ?>

            <div class="card shadow-lg my-2 mx-1 mx-auto">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col col-12 col-md-auto">
                            <h5 class="card-title"><?php echo $item["summary"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["requestName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["playDate"] ?> - <?php echo $item["playTime"] ?></h6>
                            <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>
                        </div>
                        <div class="col">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["playCity"] . "+" . $item["playStreet"] . "+" . $item["playPremise"] . "+" . $item["playPCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="row">
                                <span class="col-12" href="/opdracht/<?php echo $item["id"] ?>/aanmelden"><button type="button" class="btn btn-success m-0 col-12">Aanmelden</button></span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Speellocatie: </strong> <?php echo $item["playStreet"] . " " . $item["playPremise"] . ", " . $item["playCity"] ?></li>
                    <li class="list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["grimeStreet"] . " " . $item["grimePremise"] . ", " . $item["grimeCity"] ?></li>
                </ul>
                <div class="card-footer">
                    <small class="text-muted">3 dagen geleden</small>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>