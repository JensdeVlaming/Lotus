<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/src/css/styles.css">

    <title><?php echo SITENAME ?> | Opdracht aanvragen</title>
</head>

<body>

    <section class="container text-center mt-1">
        <form method="POST">
            <input type="submit" class="btn btn-outline-primary btn-lg" name="requests" value="Opdracht aanvragen">
            <input type="submit" class="btn btn-outline-dark btn-lg" name="assignMembers" value="Leden toewijzen">
        </form>
        <hr class="dropdown-divider">
    </section>

    <section>


        <?php foreach ($data as $item) { ?>
            <div class="card shadow-lg m-3 mx-auto" style="width: 32rem;">
                <div class="row m-2 ">
                    <div class="col-md-3">
                        <div class="card-det">
                            <h5><?php echo "" . $item["requestName"] . "" ?></h5>
                            <h6><?php echo "" . $item["playDate"] . "" ?></h6>
                            <h6><?php echo "" . $item["playGround"] . "" ?></h6>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card-map">
                            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 160px">
                                <iframe src="https://maps.google.com/maps?q=<?php echo "" . $item["playGround"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-registration text-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmationModal">Accepteren</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal">Weigeren</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        </div>
    </section>

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
                    <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                    <button type="button" class="acceptButton btn">Ga verder</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>