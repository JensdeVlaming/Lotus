<?php
foreach ($data as $item) {
?>
    <div class="container">

        <div class="row">
            <div class="col">
                <!-- Column 1 -->
                <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">

                    <h2 class="formSectionTitle fw-bold mt-3"><?php echo $item["companyName"]; ?></h2>
                    <p><?php echo $item["description"]; ?></p>
                    <button type="button" class="btn btn-warning text-white" name="updateButton" data-bs-toggle="modal" data-bs-target="#updateRequest<?php echo $item["requestId"]; ?>">Wijzigen</button>
                    <button type="button" class="btn btn-danger" name="deleteButton" data-bs-toggle="modal" data-bs-target="#cancelRequest<?php echo $item["requestId"]; ?>">Verwijderen</button>

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
                            <td scope="row">PlayDate</td>
                            <td>:</td>
                            <td><?php echo $item["date"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">PlayTime</td>
                            <td>:</td>
                            <td><?php echo $item["time"]; ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Stad</td>
                            <td>:</td>
                            <td><?php echo $item["pCity"]; ?> </td>
                        </tr>

                        <tr>
                            <td scope="row">PlayGround</td>
                            <td>:</td>
                            <td><?php echo "" . $item["pStreet"] . " " . $item["pHouseNumber"] . ", " . $item["pPostalCode"] . "" ?> </td>
                        </tr>


                        <tr>
                            <td scope="row">GrimeGround</td>
                            <td>:</td>
                            <td><?php echo "" . $item["gStreet"] . " " . $item["gHouseNumber"] . ", " . $item["gPostalCode"] . "" ?></td>
                        </tr>

                        <tr>
                            <td scope="row">Leden nodig</td>
                            <td>:</td>
                            <td><?php echo $item["casualties"]; ?></td>
                        </tr>
                    </table>

                    <?php
                    if (!empty($item["comments"])) {
                        echo '  <hr class="dropdown-divider">
                                        <h2 class="formSectionTitle fw-bold mt-3">Opmerkingen</h2>
                                        <p> ' . $item["comments"] . '</p>';
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
                        <?php echo $item["firstName"] . ' ' . $item["lastName"] . ' </br>
                                            ' . $item["clientEmail"] . ' </br>
                                            ' . $item["phoneNumber"] ?>
                    </p>
                </div>

                <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto">
                    <h2 class="formSectionTitle fw-bold mt-3">Google Maps</h2>
                    <iframe class="mb-3" src="https://maps.google.com/maps?q=<?php echo "" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <!-- Column 2 end  -->
            </div>
        </div>



    </div>

<?php } ?>

<!-- Modal -->
<div class="modal fade" id="cancelRequest<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="cancelRequestLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelRequestLabel">Weet u het zeker?</h5>
            </div>
            <div class="modal-body">
                U staat op het punt een door u gemaakte opdracht te verwijderen. Wilt u verder gaan met deze actie?
            </div>
            <div class="modal-footer">
                <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Afbreken</button>
                <a href="/opdracht/<?php echo $item["requestId"] ?>/annuleren"><button type="button" class="nextButton btn">Ga verder</button></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateRequest<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="updateRequestLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRequestLabel">Weet u het zeker?</h5>
            </div>
            <div class="modal-body">
                Deze actie is nog NIET ondersteunt. Wilt u deze actie afbreken?
            </div>
            <div class="modal-footer">
                <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Afbreken</button>
            </div>
        </div>
    </div>
</div>