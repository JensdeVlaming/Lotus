<?php
if (!empty($data["details"])) {
    if ($data["details"]["approved"] == 0) {
        $approved = '<i class="fa fa-envelope text-primary" aria-hidden="true"></i> <span class="text-muted">Aanvraag ontvangen</span>';
    } else if ($data["details"]["approved"] == 1) {
        $approved = '<i class="fa fa-clock-o text-warning" aria-hidden="true"></i> <span class="text-muted">In behandeling</span>';
    } else if ($data["details"]["approved"] == 2) {
        $approved = '<i class="fa fa-check text-success" aria-hidden="true"></i> <span class="text-muted">Goedgekeurd</span>';
    } else if ($data["details"]["approved"] == 3) {
        $approved = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Afgewezen</span>';
    } else if ($data["details"]["approved"] == 4) {
        $approved = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Geannuleerd</span>';
    } else if ($item["approved"] == 5) {
        $approved = '<i class="fa fa-bullhorn text-danger" aria-hidden="true"></i> <span class="text-muted">Wachten op goedkeuring</span>';
    }
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Column 1 -->
                <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">

                    <h2 class="formSectionTitle fw-bold mt-3"><?php echo $data["details"]["companyName"]; ?></h2>
                    <p><?php echo $data["details"]["description"]; ?></p>
                    <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>

                    <?php if ($data["details"]["approved"] == 0) { ?>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#acceptModal">Accepteren</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#denyModal">Afwijzen</button>
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
                            <td><?php echo "" . $data["details"]["pStreet"] . " " . $data["details"]["pHouseNumber"] . ", " . $data["details"]["pPostalCode"] . "" ?> </td>
                        </tr>


                        <tr>
                            <td scope="row">Grimeerlocatie</td>
                            <td>:</td>
                            <td><?php echo "" . $data["details"]["gStreet"] . " " . $data["details"]["gHouseNumber"] . ", " . $data["details"]["gPostalCode"] . "" ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Leden nodig</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["casualties"]; ?></td>
                        </tr>
                    </table>


                    <hr class="dropdown-divider">

                    <h2 class="formSectionTitle fw-bold mt-3">Factuurgegevens</h2>

                    <table class="table table-sm table-hover w-auto ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Info</th>
                            </tr>
                        </thead>
                        <tr>
                            <td scope="row">Land</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bCountry"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Provincie</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bProvince"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Stad</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bCity"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Straat</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bStreet"]; ?></td>
                        </tr>


                        <tr>
                            <td scope="row">Huisnummer</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bHouseNumber"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Postcode</td>
                            <td>:</td>
                            <td><?php echo $data["details"]["bPostalCode"]; ?></td>
                        </tr>
                    </table>

                    <?php
                    if (!empty($data["details"]["comments"])) {
                        echo '  <hr class="dropdown-divider">
                                        <h2 class="formSectionTitle fw-bold mt-3">Opmerkingen</h2>
                                        <p> ' . $data["details"]["comments"] . '</p>';
                    }
                    ?>
                </div>
                <!-- Column 1 end -->
            </div>

            <div class="col">
                <!-- Column 2 start -->
                <div class="container-sm m-1 mt-3 mt-sm-1 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Gegevens opdrachtgever</h2>
                    <p>
                        <?php echo  $data["details"]["companyName"] . ' </br>	                                
                                            ' . $data["details"]["firstName"] . ' ' . $data["details"]["lastName"] . ' </br>
                                            ' . $data["details"]["clientEmail"] . ' </br>
                                            ' . $data["details"]["phoneNumber"] ?>
                    </p>

                </div>

                <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Contactgegevens</h2>
                    <p>
                        <?php echo $data["details"]["firstName"] . ' ' . $data["details"]["lastName"] . ' </br>
                                            ' . $data["details"]["email"] . ' </br>
                                            ' . $data["details"]["phoneNumber"] ?>
                    </p>
                </div>

                <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" .  $data["details"]["pCity"] . "+" . $data["details"]["pStreet"] . "+" . $data["details"]["pHouseNumber"] . "+" . $data["details"]["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Column 2 end  -->
            </div>
        </div>

        <?php if ($data["details"]["approved"] == 1 || $data["details"]["approved"] == 2) { ?>
        <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto">
            <!-- Overview registered members -->
            <div class="accordion-item mt-2 mb-2 border-0">
                <h2 class="accordion-header" id="header-1">
                    <button class="formSectionTitle accordion-button bg-white fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#registeredMembers" aria-expended="true" aria-controls="registeredMembers">Ingeschreven leden</button>
                </h2>
            </div>

            <div id="registeredMembers" class="accordion-collapse show collapse m-2 table-responsive" aria-labelledby="header-1">
                <?php if ($data["details"]["approved"] == 1) { ?>
                <button type="button" class="btn btn-success mx-1 m-2" data-bs-toggle="modal" data-bs-target="#assignMemberModal">Lid toewijzen</button>
                <?php } ?>
                <div class="row row-cols-md-1 row-cols-lg-2 g-2 mx-1 m-2">
                    <?php
                    if (!empty($data["assignedMembers"])) {
                        foreach ($data["assignedMembers"] as $member) {
                    ?>
                            <div class="col-md-12 col-lg-6">
                                <div class="customCard card shadow-sm col-12 h-100">
                                    <div class="customCardBody card-body" for="btn-check">
                                        <div class="row gx-0">
                                            <div class="col-auto">
                                                <div data-initials="<?php echo Application::$app->controller->getInitials($member["firstName"], $member["lastName"]) ?>" class="profileIcon"></div>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title fw-bold"><?php echo $member["firstName"] . " " . $member["lastName"] ?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $member["email"] ?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $member["phoneNumber"] ?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted">Status:
                                                    <?php
                                                    if ($member["assigned"] == 0) {
                                                        echo 'Aanmelding ontvangen';
                                                    } else if ($member["assigned"] == 1) {
                                                        echo 'Toegewezen';
                                                    } else if ($member["assigned"] == 2) {
                                                        echo 'Niet toegewezen';
                                                    } else if ($member["assigned"] == 3) {
                                                        echo 'Afgemeld';
                                                    }
                                                    ?></h6>
                                            </div>
                                            <div class="col-12">
                                                <div class="float-end">
                                                    <a href="/opdracht/<?php echo $data["details"]["requestId"] . "/" . $member["email"] ?>/verwijderen"><button type="button" class="btn btn-danger">Verwijderen</button></a>
                                                </div>
                                            </div>
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
                                        <h2 class="formSectionTitle fw-bold m-3 text-center">Er zijn nog geen leden aangemeld voor deze opdracht!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold m-3 text-center">De opdracht die u zoekt is niet gevonden! Check of het juiste id is meegegeven!</h2>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal accept -->
<div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="acceptModalLabel">Weet u het zeker?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Weet je zeker dat je opdracht wilt accepteren?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                <a href="/opdracht/<?php echo $data["details"]["requestId"] ?>/accepteren"><button type="button" class="btn btn-primary">Ga verder</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Modal deny -->
<div class="modal fade" id="denyModal" tabindex="-1" aria-labelledby="denyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="denyModalLabel">Weet u het zeker?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Weet je zeker dat je deze opdracht wilt afwijzen? Deze actie kan niet ongedaan worden gemaakt.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                <a href="/opdracht/<?php echo $data["details"]["requestId"] ?>/afwijzen"><button type="button" class="btn btn-primary">Ga verder</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Assign Member -->
<div class="modal fade" id="assignMemberModal" tabindex="-1" aria-labelledby="AssignMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lid toevoegen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-md-1 row-cols-lg-2 g-2">
                    <?php
                    if (!empty($data["openMembers"])) {
                        foreach ($data["openMembers"] as $member) {
                    ?>
                            <div class="col-md-12 col-lg-6">
                                <div class="customCard card shadow-sm col-12 h-100">
                                    <div class="customCardBody card-body" for="btn-check">
                                        <div class="row gx-0">
                                            <div class="col-auto">
                                                <div data-initials="<?php echo Application::$app->controller->getInitials($member["firstName"], $member["lastName"]) ?>" class="profileIcon"></div>
                                            </div>
                                            <div class="col">
                                                <h5 class="card-title fw-bold"><?php echo $member["firstName"] . " " . $member["lastName"] ?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $member["email"] ?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $member["phoneNumber"] ?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted">Deelnemingen: <?php echo $member["participations"] ?></h6>
                                            </div>
                                            <div class="col-12">
                                                <div class="float-end">
                                                    <a href="/opdracht/<?php echo $data["details"]["requestId"] . "/" . $member["email"] ?>/toewijzen"><button type="button" class="btn btn-success">Toewijzen</button></a>
                                                </div>
                                            </div>
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
                                        <h2 class="formSectionTitle fw-bold m-3 text-center">Er zijn geen beschikbare leden!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>