<?php
if (!empty($data["details"])) {
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3"><?php echo $data["details"]["companyName"]; ?></h2>
                    <p><?php echo $data["details"]["description"]; ?></p>
                    <?php
                    if ($data["details"]["assigned"] == null) {
                        $assignStatus = null;
                    } else if ($data["details"]["assigned"] == 0) {
                        $assignStatus = '<i class="fa fa-envelope text-primary" aria-hidden="true"></i> <span class="text-muted">Aanmelding ontvangen</span>';
                    } else if ($data["details"]["assigned"] == 1) {
                        $assignStatus = '<i class="fa fa-check text-success" aria-hidden="true"></i> <span class="text-muted">Toegewezen</span>';
                    } else if ($data["details"]["assigned"] == 2) {
                        $assignStatus = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Niet toegewezen</span>';
                    } else if ($data["details"]["assigned"] == 3) {
                        $assignStatus = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Afgemeld</span>';
                    }

                    $currentDate = new DateTime('now');
                    $playDate = new DateTime($data["details"]['date']);
                    $days = $playDate->diff($currentDate);
                    $diffDate = $days->format("%a") + 1;

                    ?>
                    <h6 class="card-subtitle mb-2"><?php echo $assignStatus ?></h6>
                    <?php if (is_null($data["details"]["assigned"]) || $data["details"]["assigned"] == 3) { ?>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#participateModal"><?php if ($data["details"]["assigned"] == 3) { echo "Opnieuw aanmelden"; } else { echo "Aanmelden"; }; ?></button>
                    <?php } else if ($data["details"]["assigned"] == 0) { ?>
                        <button type="button" class="btn btn-danger" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#deregisterNotAssignedModal">Inschrijving annuleren</button>
                    <?php } else if ($data["details"]["assigned"] == 1 && $diffDate > 1) { ?>
                        <button type="button" class="btn btn-danger" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#deregisterAssignedModal">Inschrijving annuleren</button>
                    <?php } else if ($data["details"]["assigned"] == 1 && $diffDate <= 1) { ?>
                        <button type="button" class="btn btn-danger" style="z-index: 10" data-bs-toggle="modal" data-bs-target="#lateDeregisterAssignedModal">Aanvraag voor afmelding</button>
                    <?php } ?>
                    <!-- <?php if (is_null($data["details"]["assigned"]) || $data["details"]["assigned"] == 3) { ?>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#participateModal"><?php if ($data["details"]["assigned"] == 3) {
                                                                                                                                    echo "Opnieuw aanmelden";
                                                                                                                                } else {
                                                                                                                                    echo "Aanmelden";
                                                                                                                                }; ?></button>
                    <?php } else if (!is_null($data["details"]["assigned"]) || $data["details"]["assigned"] != 3) { ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#unparticipateModal">Afmelden</button>
                    <?php } ?> -->

                    <?php if ($data["details"]["assigned"] == 1) { ?>
                        <a href="/opdracht/1/formulier" target="_blank"><button type="button" class="btn btn-primary">Formulier</button></a>
                    <?php } ?>

                    <hr class="dropdown-divider">
                    <table class="table table-sm table-hover w-auto ">
                        <thead>
                            <tr>
                                <th scope="col">Details</th>
                                <th scope="col"></th>
                                <th scope="col">Info</th>
                            </tr>
                        </thead>
                        <tr>
                            <td scope="row">Datum</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["date"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Tijd</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["time"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Stad</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["pCity"]; ?> </td>
                        </tr>

                        <tr>
                            <td scope="row">Locatie</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["pStreet"] . " " . $data["details"]["pHouseNumber"] . ", " . $data["details"]["pPostalCode"] ?> </td>
                        </tr>


                        <tr>
                            <td scope="row">Grimeerlocatie</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["gStreet"] . " " . $data["details"]["gHouseNumber"] . ", " . $data["details"]["gPostalCode"] ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Leden nodig</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["casualties"]; ?></td>
                        </tr>
                    </table>

                    <?php if (!empty($data["details"]["comments"])) { ?>
                        <hr class="dropdown-divider">
                        <h2 class="formSectionTitle fw-bold mt-3">Opmerkingen</h2>
                        <p><?php echo $data["details"]["comments"]; ?></p>
                    <?php } ?>
                </div>
            </div>

            <div class="col">
                <div class="container-sm m-1 mt-3 mt-sm-1 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Gegevens opdrachtgever</h2>
                    <div class="mb-3">
                        <a><?php echo $data["details"]["companyName"] ?></a><br>
                        <a><?php echo $data["details"]["firstName"] . " " . $data["details"]["lastName"] ?></a><br>
                        <a><?php echo $data["details"]["clientEmail"] ?></a><br>
                        <a><?php echo $data["details"]["phoneNumber"] ?></a>
                    </div>
                </div>

                <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                    <iframe class="mb-3" src="https://maps.google.com/maps?q=<?php echo "" . $data["details"]["pStreet"] . "+" . $data["details"]["pHouseNumber"] . "+" . $data["details"]["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>



    </div>

<?php } else { ?>
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold m-3 text-center">De opdracht die u zoekt is niet gevonden!</h2>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modals -->
<div class="modal fade" id="participateModal" tabindex="-1" aria-labelledby="participateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="participateModalLabel">Weet u het zeker?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Weet je zeker dat je je wilt aanmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                <a href="/opdracht/<?php echo $data["details"]["requestId"] ?>/aanmelden"><button type="button" class="btn btn-primary">Ga verder</button></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unparticipateModal" tabindex="-1" aria-labelledby="unparticipateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="unparticipateModalLabel">Afmelden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/opdracht/afmelden" method="POST">
                <div class="modal-body">
                    <p>Afmelden voor een opdracht het liefst minimaal 2 dagen van tevoren met een geldige reden!</p>
                    <label for="message-text" class="col-form-label">Reden tot afmelding:</label>
                    <textarea class="form-control" name="reasonFor" id="message-text"></textarea>
                    <input type="hidden" name="requestId" value="<?php echo $data["details"]["requestId"] ?>">
                </div>
                <div class="modal-footer">
                    <input type="button" class="cancelButton btn" data-bs-dismiss="modal" value="Anuleren">
                    <input type="submit" class="nextButton btn" value="Ga verder">
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                <form action="/opdracht/afmelden" method="POST">
                    <input type="submit" <a href="/opdracht/<?php echo $data["details"]["requestId"] ?>/afmelden"><button class="btn btn-primary" data-bs-target="#confirmationModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Verstuur</button></a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModalToggle" aria-hidden="true" aria-labelledby="confirmationModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalToggleLabel">Verzoek verstuurd</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Verzoek tot afmelding is verstuurd naar de coördinator. Afmelding is pas compleet wanneer het verzoek is goedgekeurd!
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#confirmationModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Ga verder</button>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="deregisterNotAssignedModal" tabindex="-1" aria-labelledby="deregisterNotAssignedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deregisterNotAssignedModalLabel">Weet u het zeker?</h5>
            </div>
            <div class="modal-body">
                Weet u zeker dat u zich wilt afmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
            </div>
            <form action="/opdracht/afmelden" method="POST">
                <div class="modal-footer">
                    <input type="hidden" name="requestId" value="<?php echo $data["details"]["requestId"] ?>">
                    <input type="button" class="cancelButton btn" data-bs-dismiss="modal" value="Anuleren">
                    <input type="submit" class="nextButton btn" value="Ga verder">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deregisterAssignedModal" tabindex="-1" aria-labelledby="deregisterAssignedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deregisterAssignedModalLabel">Weet u het zeker?</h5>
            </div>
            <div class="modal-body">
                Deze opdracht is al toegewezen aan u, gelieve u niet af te melden zonder geldige reden. <br>
                Weet u zeker dat u zich wilt afmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
            </div>
            <form action="/opdracht/afmelden" method="POST">
                <div class="m-3">
                    <label for="message-text" class="col-form-label">Reden tot afmelding:</label>
                    <textarea class="form-control" name="reasonFor" id="message-text"></textarea>
                    <input type="hidden" name="requestId" value="<?php echo $item["requestId"] ?>">
                </div>
                <div class="modal-footer">
                    <input type="button" class="cancelButton btn" data-bs-dismiss="modal" value="Anuleren">
                    <input type="submit" class="nextButton btn" value="Ga verder">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="lateDeregisterAssignedModal" tabindex="-1" aria-labelledby="lateDeregisterAssignedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lateDeregisterAssignedModalLabel">Afmeldtermijn te kort</h5>
            </div>
            <div class="modal-body">
                Deze opdracht vindt binnen 1 dag plaats. Neem contact op met de coördinator om u af te melden.
            </div>
            <div class="modal-footer">
                <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>