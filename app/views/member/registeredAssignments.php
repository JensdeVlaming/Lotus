<div class="row row-cols-md-1 row-cols-lg-3 g-2 m-2">
    <?php
    foreach ($data as $item) {
        if ($item["assigned"] == 0) {
            $approved = '<span class="text-muted">Ingeschreven </span> <i class="fa fa-clock-o text-warning" aria-hidden="true"></i>'; 
        } else if ($item["assigned"] == 1) {
            $approved = '<span class="text-muted">Toegewezen </span> <i class="fa fa-check text-success" aria-hidden="true"></i>';
        } else if ($item["assigned"] == 2) {
            $approved = '<span class="text-muted">Niet toegewezen </span> <i class="fa fa-times text-danger" aria-hidden="true"></i>';
        }
    ?>
        <div class="col-md-12 col-lg-4">
            <div class="customCard card shadow-sm col-12 h-100">
                <div class="customCardBody card-body">
                    <div class="row gx-5">
                        <div class="col col-12">
                            <h5 class="card-title"><?php echo $item["description"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> - <?php echo $item["time"] ?></h6>
                            <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>
                        </div>
                        <div class="col col-12">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <?php if ($item["assigned"] == 0) { ?>
                                <div class="row g-0">
                                    <button type="button" class="btn btn-danger m-0 col-12" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#deregisterModal<?php echo $item["requestId"]; ?>">Inschrijving annuleren</button>
                                </div>
                            <?php } else if ($item["assigned"] == 1) { ?>
                                <div class="row g-0">
                                    <button type="button" class="btn btn-danger m-0 col-12" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#deregisterModal<?php echo $item["requestId"]; ?>">Aanvraag voor afmelding</button>
                                </div>
                            <?php } else if ($item["assigned"] == 1) { ?>
                                <div class="row g-0">
                                    <button type="button" class="btn btn-danger m-0 col-12" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#24hderegisterModal<?php echo $item["requestId"]; ?>">Aanvraag voor afmelding</button>
                                </div>
                            <?php } ?>
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

        <!-- Modal -->
        <div class="modal fade" id="deregisterModal<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="deregisterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deregisterModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        Weet u zeker dat u zich wilt afmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $item['requestId']?>/afmelden"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deregisterModal<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="deregisterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deregisterModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        Weet je zeker dat u zich wilt afmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $item['requestId']?>/afmelden"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>