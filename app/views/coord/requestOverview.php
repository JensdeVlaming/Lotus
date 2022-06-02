<div class="container">
    <?php
    $buttonClicked = "A" || "D";
    foreach ($data as $item) {

    ?>

        <div class="card shadow-lg my-2 mx-1 mx-auto">
            <div class="card-body">
                <div class="row gx-5">
                    <div class="col col-12 col-md-auto">
                        <h5 class="card-title"><?php echo $item["description"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> - <?php echo $item["time"] ?></h6>
                    </div>
                    <div class="col">
                        <div class="embed-responsive text-center col-12">
                            <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                        </div>
                        <div class="row g-1">
                            <button type="button" class="btn btn-danger m-0 col-6" data-bs-toggle="modal" data-bs-target="#declineModal" name="declineButton">Afwijzen</button>
                            <button type="button" class="btn btn-success m-0 col-6" data-bs-toggle="modal" data-bs-target="#confirmationModal" name="acceptButton">Accepteren</button>
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
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="declineModal" tabindex="-1" aria-labelledby="declineModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="declineModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        U staat op het punt een opdracht te weigeren. Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $item["requestId"] ?>/afwijzen"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        U staat op het punt een opdracht te accepteren. Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $item["requestId"] ?>/accepteren"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>