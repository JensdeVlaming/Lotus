<div class="row row-cols-md-1 row-cols-lg-3 g-2 m-2">
    <?php
    foreach ($data as $item) {
    ?>
        <div class="col-md-12 col-lg-4">
            <div class="customCard card shadow-sm col-12 h-100">
                <div class="customCardBody card-body">
                    <div class="row gx-5">
                        <div class="col col-12">
                            <h5 class="card-title"><?php echo $item["description"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> - <?php echo $item["time"] ?></h6>
                            <!-- <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6> -->
                        </div>
                        <div class="col col-12">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="row g-0">
                                <span class="col-12" href="/opdracht/<?php echo $item["requestId"] ?>/aanmelden"><button type="button" class="btn btn-success m-0 col-12">Aanmelden</button></span>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="customCardList list-group-item"><strong>Speellocatie: </strong> <?php echo $item["pStreet"] . " " . $item["pHouseNumber"] . ", " . $item["pCity"] ?></li>
                    <li class="customCardList list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["gStreet"] . " " . $item["gHouseNumber"] . ", " . $item["gCity"] ?></li>
                </ul>
                <a class="stretched-link" href="/opdracht/<?php echo $item["requestId"] ?>/details"></a>
            </div>
        </div>
    <?php
    }
    ?>
</div>