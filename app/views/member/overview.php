<div class="container">
    <div class="row row-cols-md-1 row-cols-lg-3 g-2 my-2">
        <?php
        foreach ($data as $item) {
        ?>
<<<<<<< HEAD
            <div class="col-md-auto">
                <div class="customCard card shadow-sm col-12  h-100">
                    <div class="customCardBody card-body">
                        <div class="row gx-5">
                            <div class="col col-12">
                                <h5 class="card-title"><?php echo $item["summary"] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["requestName"] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["playDate"] ?> - <?php echo $item["playTime"] ?></h6>
                                <!-- <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6> -->
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
                        <li class="customCardList list-group-item"><strong>Speellocatie: </strong> <?php echo $item["playStreet"] . " " . $item["playPremise"] . ", " . $item["playCity"] ?></li>
                        <li class="customCardList list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["grimeStreet"] . " " . $item["grimePremise"] . ", " . $item["grimeCity"] ?></li>
                    </ul>
                    <!-- <div class="card-footer">
                        <small class="text-muted">3 dagen geleden</small>
                    </div> -->
=======

            <div class="card shadow-lg my-2 mx-1 mx-auto">
                <div class="card-body">
                    <div class="row gx-5">
                        <div class="col col-12 col-md-auto">
                            <h5 class="card-title"><?php echo $item["description"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> - <?php echo $item["time"] ?></h6>
                            <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>
                        </div>
                        <div class="col">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="row">
                                <span class="col-12" href="/opdracht/<?php echo $item["requestId"] ?>/aanmelden"><button type="button" class="btn btn-success m-0 col-12">Aanmelden</button></span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Speellocatie: </strong> <?php echo $item["pStreet"] . " " . $item["pHouseNumber"] . ", " . $item["pCity"] ?></li>
                    <li class="list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["gStreet"] . " " . $item["gHouseNumber"] . ", " . $item["gCity"] ?></li>
                </ul>
                <div class="card-footer">
                    <small class="text-muted">3 dagen geleden</small>
>>>>>>> 26adc6ede1b01c26a334f77d6df6df71c7df7123
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>