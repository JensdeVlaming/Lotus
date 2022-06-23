<?php
if (!empty($data)) {
    if ($data["gender"] === "M") {
        $gender = "Man";
    } else if ($data["gender"] === "V") {
        $gender = "Vrouw";
    } else {
        $gender = "Other";
    }
?>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Column 1 -->
                <!-- Gebruikersgegevens -->
                <div class="customCard card shadow-sm col-auto mb-2">
                    <div class="customCardBoy card-body">
                        <h2 class="formSectionTitle fw-bold mt-3">Gebruikersgegevens</h2>
                        <table class="table table-sm table-hover w-auto ">
                            <thead>
                                <tr>
                                    <th scope="col">Gegeven</th>
                                    <th scope="col"></th>
                                    <th scope="col">Info</th>
                                </tr>
                            </thead>
                            <tr>
                                <td scope="row">Naam</td>
                                <td>:</td>
                                <td><?php echo '' . $data["firstName"] . '  ' . $data["lastName"] . ''; ?></td>
                            </tr>

                            <tr>
                                <td scope="row">Geslacht</td>
                                <td>:</td>
                                <td><?php echo $gender; ?></td>
                            </tr>

                            <tr>
                                <td scope="row">email</td>
                                <td>:</td>
                                <td><?php echo $data["email"]; ?></td>
                            </tr>

                            <tr>
                                <td scope="row">Telefoonnummer</td>
                                <td>:</td>
                                <td><?php echo $data["phoneNumber"]; ?></td>
                            </tr>

                            <tr>
                                <td scope="row">Adres</td>
                                <td>:</td>
                                <td><?php echo '' . $data["street"] . '  ' . $data["premise"] . ', ' . $data["postalCode"] . ' ' . $data["city"] . ''; ?></td>
                            </tr>

                        </table>

                        <hr class="dropdown-divider">
                        <a class="submitRequestButton btn btn-warning text-white mb-3" href="/profiel/wijzigen">Wijzig profiel</a>
                        <a class="submitRequestButton btn btn-warning text-white mb-3" href="/profiel/wijzig">Wijzig wachtwoord</a>
                    </div>
                </div>

                <!-- Locatie -->
                <div class="customCard card shadow-sm col-auto mb-2">
                    <div class="customCardBoy card-body">
                        <h2 class="formSectionTitle fw-bold">Locatie</h2>
                        <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" . $data["city"] . "+" . $data["street"] . "+" . $data["premise"] . "+" . $data["postalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Column 1 end -->
            </div>

            <div class="col">
                <!-- Column 2 start -->

            <?php } else {
            ?>
                <div class="container">

                    <div class="row">
                        <div class="col">
                            <div class="customCard card shadow-sm col-auto mb-2">
                                <div class="customCardBoy card-body">
                                    <h2 class="formSectionTitle fw-bold m-3 text-center">Het lid dat u zoekt is niet gevonden! Check of het juiste email is meegegeven!.</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <!-- Column 2 end  -->
    </div>
    </div>

    </div>