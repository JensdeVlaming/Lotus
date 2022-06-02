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

    <title><?php echo SITENAME ?> | Opdracht aanvragen</title>
</head>

<body>
    <div class="container">
        <?php
        foreach ($data as $item) {

        ?>

            <div class="card shadow-lg my-2 mx-1 mx-auto">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col col-12 col-md-auto">
                            <h5 class="card-title"><?php echo $item["summary"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["requestName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["playDate"] ?> - <?php echo $item["playTime"] ?></h6>
                        </div>
                        <div class="col">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["playCity"] . "+" . $item["playStreet"] . "+" . $item["playPremise"] . "+" . $item["playPCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="row g-1">
                                <span class="col col-6" href="/opdracht/<?php echo $item["id"] ?>/afwijzen"><button type="button" class="btn btn-danger m-0 col-12" data-bs-toggle="modal" data-bs-target="#confirmationModal">Afwijzen</button></span>
                                <span class="col col-6" href="/opdracht/<?php echo $item["id"] ?>/aanmelden"><button type="button" class="btn btn-success m-0 col-12" data-bs-toggle="modal" data-bs-target="#confirmationModal">Accepteren</button></span>
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

            <!-- Modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Weet u het zeker?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Deze actie kan niet ongedaan worden.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancelButton btn" data-bs-dismiss="modal" >Annuleren</button>
                            <button type="button" class="acceptButton btn">Ga verder</button>
                        </div>
                    </div>
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