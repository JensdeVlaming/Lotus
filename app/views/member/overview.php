<div class="row row-cols-md-1 row-cols-lg-3 g-2 m-2">
    <?php
    if (!empty($data)) {
        foreach ($data as $item) {
    ?>
            <div class="col-md-12 col-lg-4">
                <div class="customCard card shadow-sm col-12 h-100">
                    <div class="customCardBody card-body">
                        <div class="row gx-5">
                            <div class="col col-12">
                                <h5 class="card-title"><?php echo $item["description"] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> | <?php echo $item["time"] ?> - <?php echo $item["endTime"] ?></h6>
                            </div>
                            <div class="col col-12">
                                <div class="embed-responsive text-center col-12">
                                    <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                                </div>
                                <div class="row g-0">
                                    <?php if ($item["assigned"] == 3) {
                                        $button = "Opnieuw aanmelden";
                                    } else {
                                        $button = "Aanmelden";
                                    }; ?>
                                    <button type="button" class="btn btn-success m-0 col-12" style="z-index: 10" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#participateModal<?php echo $item["requestId"]; ?>"><?php echo $button; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="customCardList list-group-item"><strong>Speellocatie: </strong> <?php echo $item["pStreet"] . " " . $item["pHouseNumber"] . ", " . $item["pCity"] ?></li>
                        <li class="customCardList list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["gStreet"] . " " . $item["gHouseNumber"] . ", " . $item["gCity"] ?></li>
                    </ul>
                    <a class="stretched-link" style="z-index: 9" href="/opdracht/<?php echo $item["requestId"] ?>/details"></a>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="participateModal<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="participateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="participateModalLabel">Weet u het zeker?</h5>
                        </div>
                        <div class="modal-body">
                            Weet u zeker dat u zich wilt aanmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                            <a href="/opdracht/<?php echo $item["requestId"] ?>/aanmelden"><button type="button" class="nextButton btn">Ga verder</button></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                        <h2 class="formSectionTitle fw-bold m-3 text-center">Er zijn momenteel geen opdrachten waar u zich voor kan aanmelden!</h2>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>