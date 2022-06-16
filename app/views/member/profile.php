<?php 
    if (!empty($data)){
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
                    <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
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
                                    <td><?php echo ''.$data["firstName"].'  '.$data["lastName"].'';?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Geslacht</td>
                                    <td>:</td>
                                    <td><?php echo $gender;?></td>
                                    </tr>   
                
                                    <tr>
                                    <td scope="row">email</td>
                                    <td>:</td>
                                    <td><?php echo $data["email"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Telefoonnummer</td>
                                    <td>:</td>
                                    <td><?php echo $data["phoneNumber"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Adres</td>
                                    <td>:</td>
                                    <td><?php echo ''.$data["street"].'  '.$data["premise"].', '.$data["postalCode"].' '.$data["city"].'' ;?></td>
                                    </tr>
                                
                            </table>
                            
                            <hr class="dropdown-divider">
                            <button type="button" class="btn btn-warning text-white mb-3" data-bs-toggle="modal" data-bs-target="#profileModal">Profiel wijzigen</button>
                            <button type="button" class="btn btn-warning text-white mb-3 " data-bs-toggle="modal" data-bs-target="#passwordModal">Wachtwoord wijzigen</button>
                    </div>
                   
                    <!-- Locatie -->
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                        <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" .$data["city"]. "+" .$data["street"]."+" .$data["premise"]."+" .$data["postalCode"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
                    </div> 
                    <!-- Column 1 end -->
                </div>

                <div class="col">
                     <!-- Column 2 start -->
                    <div class="container-sm m-1 mt-3 mt-sm-1 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Opdrachten</h2>
                        <div class="accordion accordion-color mt-3 mb-3" id="chapters">
                            
                            <!-- Wachtende opdrachten -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="header-2">
                                    <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#chapter-2" aria-expended="true" 
                                    aria-controls="chapter-2">Ingeschreven opdrachten (<?php echo $data["solicitAssignments"];?>)</button>
                                </h2>
                                <div id="chapter-2" class="accordion-collapse show collapse m-2" aria-labelledby="header-2">
                                    <?php if (count($data["solicitAssignmentList"]) == 0) { echo "Dit lid heeft geen openstaande aanmeldingen";} else {?>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover w-auto ">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col"></th>
                                            <th scope="col">Bedrijf</th>
                                            <th scope="col">Stad</th>
                                            <th scope="col">Datum</th>
                                            <th scope="col">Tijd</th>
                                            </tr>
                                        </thead>
                                            <?php foreach($data["solicitAssignmentList"] as $request) { ?>
                                                <tr class="clickable " onclick="window.location='//localhost/opdracht/<?php echo $request['requestId'];?>/details-inschrijvingen'">
                                                    <td class="text-center" scope="row"><?php echo $request["requestId"];?></td>
                                                    <td>:</td>
                                                    <td class="text-left"><?php echo $request["companyName"];?></td>
                                                    <td class="text-center"><?php echo $request["cCity"];?></td>
                                                    <td class="text-center"><?php echo $request["date"];?></td>
                                                    <td class="text-center"><?php echo $request["time"];?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                <?php }?>           
                                </div>
                            </div>

                            <!-- Toegewezen opdrachten -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="header-1">
                                    <button class="accordion-button bg-light text-dark" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#chapter-1" aria-expended="true" 
                                    aria-controls="chapter-1">Toegewezen opdrachten (<?php echo $data["upcommingAssignments"];?>)</button>
                                </h2>
                                <div id="chapter-1" class="accordion-collapse collapse m-2" aria-labelledby="header-1">
                                    <?php if (count($data["upcommingAssignmentList"]) == 0) { echo "Dit lid heeft nog geen opdrachten toegewezen gekregen";} else { ?>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover w-auto ">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col"></th>
                                            <th scope="col">Bedrijf</th>
                                            <th scope="col">Stad</th>
                                            <th scope="col">Datum</th>
                                            <th scope="col">Tijd</th>
                                            </tr>
                                        </thead>
                                            <?php foreach($data['upcommingAssignmentList'] as $request) { ?> 
                                                <tr class='clickable' 
                                                onclick="window.location='//localhost/opdracht/<?php echo $request['requestId'];?>/details-coordinator'" >
                                                    <td class="text-center" scope="row"><?php echo $request["requestId"];?></td>
                                                    <td>:</td>
                                                    <td class="text-left"><?php echo $request["companyName"];?></td>
                                                    <td class="text-center"><?php echo $request["cCity"];?></td>
                                                    <td class="text-center"><?php echo $request["date"];?></td>
                                                    <td class="text-center"><?php echo $request["time"];?></td>
                                                </tr>
                                            <?php } ?> 
                                        </table>
                                    </div>            
                                <?php }?> 
                                </div>
                            </div>


                            <!-- Voltooide opdrachten -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="header-3">
                                    <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#chapter-3" aria-expended="true" 
                                    aria-controls="chapter-3">Voltooide opdrachten (<?php echo $data["completedAssignments"];?>)</button>
                                </h2>
                                <div id="chapter-3" class="accordion-collapse collapse m-2" aria-labelledby="header-3">
                                    <?php if (count($data["completedAssignmentList"]) == 0) { echo "Dit lid heeft geen voltooide opdrachten";} else {?>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-hover w-auto ">
                                        <thead>
                                            <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col"></th>
                                            <th scope="col">Bedrijf</th>
                                            <th scope="col">Stad</th>
                                            <th scope="col">Datum</th>
                                            <th scope="col">Tijd</th>
                                            </tr>
                                        </thead>
                                            <?php foreach($data["completedAssignmentList"] as $request) { ?>
                                                <tr class="clickable " onclick="window.location='//localhost/opdracht/<?php echo $request['requestId'];?>/details-coordinator'">
                                                    <td class="text-center" scope="row"><?php echo $request["requestId"];?></td>
                                                    <td>:</td>
                                                    <td class="text-left"><?php echo $request["companyName"];?></td>
                                                    <td class="text-center"><?php echo $request["cCity"];?></td>
                                                    <td class="text-center"><?php echo $request["date"];?></td>
                                                    <td class="text-center"><?php echo $request["time"];?></td>
                                                </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                                <?php }} else {
                                            ?>
                                            <div class="container">
                                                
                                                <div class="row">
                                                        <div class="col">
                                                            <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                                                            <h2 class="formSectionTitle fw-bold m-3 text-center">Het lid dat u zoekt is niet gevonden! Check of het juiste email is meegegeven!.</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        
                                            <?php }?>         
                                </div>
                            </div>
                        </div>
                    </div> 

                    <!-- <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Profiel wijzigen</h2>
                        <button type="button" class="btn btn-warning text-white mb-3" data-bs-toggle="modal" data-bs-target="#profileModal">Profiel wijzigen</button>
                        <button type="button" class="btn btn-warning text-white mb-3 " data-bs-toggle="modal" data-bs-target="#passwordModal">Wachtwoord wijzigen</button>
                    </div>  -->
                    <!-- Column 2 end  -->
                </div>
                </div>
            </div>   

  <!-- MODALS -->
  <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordModalLabel">Wachtwoord wijzigen!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                           
                        <form method="POST" class=" align-items-center justify-content-center">

                        <div class="row">
                        <div class="col-12">
                                <input type="text" class="form-control d-none request-input m-1 w-75" id="email" name="email" value="<?php echo $data["email"];?>">                              
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control request-input m-1 w-75" id="oldPdw" name="oldPdw" placeholder="Oud wachtwoord">                              
                            </div>
                            <div class="col-12">
                            <small id="passwordHelpInline m-1 ms-3" class="text-muted">
                                Must be 8-20 characters long.
                            </small>
                                <input type="password" class="form-control request-input m-1 w-75" id="newPdw" name="newPdw" placeholder="Nieuw wachtwoord">
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control request-input m-1 w-75" id="copyPdw" name="copyPdw"  placeholder="Herhaal wachtwoord">                             
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-1 mt-3" data-bs-dismiss="modal">Wijzig wachtwoord</button>
                        <!-- <?php if (isset($data["error"])) { ?><div class="alert alert-danger" id="alert-password" role="alert"><span class="text-center"><?php echo $data["error"]; ?></span></div> <?php } ?> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ga terug</button>
                    </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Profielgegevens wijzigen!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class=" align-items-center justify-content-center">

                        <div class="row">
                            <div class="col-12">
                                <label for="postalCodeBillingAddress"class="mt-2 ms-2"><span class="formLabel">Voornaam:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="firstName" name="firstName" value="<?php echo $data["firstName"];?>"> 
                            </div>
                            <div class="col-12">
                            <label for="postalCodeBillingAddress"class="mt-2 ms-2"><span class="formLabel">Achternaam:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="lastName" name="lastName" value="<?php echo $data["lastName"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editEmail"class="mt-2 ms-2"><span class="formLabel">Email:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="email" name="email"  value="<?php echo $data["email"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editPhoneNumber"class="mt-2 ms-2"><span class="formLabel">Telefoonnummer:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="phoneNumber" name="phoneNumber"  value="<?php echo $data["phoneNumber"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editCity"class="mt-2 ms-2"><span class="formLabel">Stad:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="city" name="city"  value="<?php echo $data["city"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editStreet"class="mt-2 ms-2"><span class="formLabel">Straatnaam:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="street" name="street"  value="<?php echo $data["street"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editPremise"class="mt-2 ms-2"><span class="formLabel">Huisnummer:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="premise" name="premise"  value="<?php echo $data["premise"];?>">
                            </div>
                            <div class="col-12">
                            <label for="editPostalCode"class="mt-2 ms-2"><span class="formLabel">Postcode:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="postalCode" name="postalCode"  value="<?php echo $data["postalCode"];?>">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control request-input m-1 w-75 d-none" id="checkEmail" name="checkEmail"  value="<?php echo $data["email"];?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-1 mt-3" data-bs-dismiss="modal">Wijzig gegevens</button>
                        <!-- <?php if (isset($data["error"])) { ?><div class="alert alert-danger" id="alert-profile" role="alert"><span class="text-center"><?php echo $data["error"]; ?></span></div> <?php } ?> -->

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ga terug</button>
                    </div>
                    </div>
                </div>
            </div>

 
