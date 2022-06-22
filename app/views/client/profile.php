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
                     <!-- Column 2 -->
                     <!-- Bedrijfsgegevens -->
                    <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                        <h2 class="formSectionTitle fw-bold mt-3">Bedrijfsgegevens</h2>
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
                    </div>
                   
                    <!-- Column 2 end -->
                </div>

                                <?php } else {
                                            ?>
                                            <div class="container">
                                                
                                                <div class="row">
                                                        <div class="col">
                                                            <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                                                            <h2 class="formSectionTitle fw-bold m-3 text-center">Het profiel dat u zoekt is niet gevonden! Check of het juiste email is meegegeven!.</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        
                                            <?php }?>         
                                <!-- </div> -->
                            </div>
                        </div>
                    </div> 
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
                        <?php if (isset($data["error"])) { ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" id="alert-login" role="alert">
                                        <span class="text-center"><?php echo $data["error"]; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                        <div class="col-12">
                                <input type="text" class="form-control d-none request-input m-1 w-75" id="email" name="email" value="<?php echo $data["email"];?>">                         
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control request-input m-1 w-75" id="oldPdw" name="oldPdw" placeholder="Oud wachtwoord" required>                              
                            </div>
                            <div class="col-12">
                            <small id="passwordHelpInline m-1 ms-3" class="text-muted">
                                Must be 8-20 characters long.
                            </small>
                                <input type="password" class="form-control request-input m-1 w-75" id="newPdw" name="newPdw" placeholder="Nieuw wachtwoord" required>
                            </div>
                            <div class="col-12">
                                <input type="password" class="form-control request-input m-1 w-75" id="copyPdw" name="copyPdw"  placeholder="Herhaal wachtwoord" required>                             
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary m-1 mt-3">Wijzig wachtwoord</button>
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
                            <?php if (isset($data["error"])) { ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" id="alert-login" role="alert">
                                        <span class="text-center"><?php echo $data["error"]; ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-12">
                                <label for="postalCodeBillingAddress"class="mt-2 ms-2"><span class="formLabel">Voornaam:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="firstName" name="firstName" value="<?php echo $data["firstName"];?>" required> 
                            </div>
                            <div class="col-12">
                                <label for="postalCodeBillingAddress"class="mt-2 ms-2"><span class="formLabel">Achternaam:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="lastName" name="lastName" value="<?php echo $data["lastName"];?>" required>
                            </div>
                            <div class="col-12">
                                <label for="editEmail"class="mt-2 ms-2"><span class="formLabel">Email:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="email" name="email"  value="<?php echo $data["email"];?>" required>
                            </div>
                            <div class="col-12">
                                <label for="editPhoneNumber"class="mt-2 ms-2"><span class="formLabel">Telefoonnummer:</span></label>
                                <input type="text" class="form-control request-input m-1 w-75" id="phoneNumber" name="phoneNumber"  value="<?php echo $data["phoneNumber"];?>" required>
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
                                <label for="editPostalCode"class="mt-2 ms-2"><span class="formLabel">Geslacht:</span></label>
                                <select class="form-select mt-2 ms-2 w-25" aria-label="Default select example" id="gender" name="gender">
                                    <option selected></option>
                                    <option value="1" <?php if ($data['gender'] == 'M') echo ' selected="selected"'; ?>>Man</option>
                                    <option value="2"<?php if ($data['gender'] == 'V') echo ' selected="selected"'; ?>>Vrouw</option>
                                    <option value="3"<?php if ($data['gender'] == 'O') echo ' selected="selected"'; ?>>Anders</option>
                                </select>
                                <input type="text" class="form-control request-input m-1 w-75 d-none" id="userEmail" name="userEmail"  value="<?php echo $data["email"];?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-1 mt-3">Wijzig gegevens</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ga terug</button>
                    </div>
                    </div>
                </div>
            </div>
              
   
       

         
