<div class="container">
    
        <!-- Edit profile -->
        <div class="row justify-content-center">
                <div class="col-sm-6 col-xs-12 ">
                     <!-- Column 1 -->
                     <!-- Gebruikersgegevens -->
                    <div class="container-sm m-1 border shadow-sm rounded-3">
                        <h2 class="formSectionTitle fw-bold mt-3">Profielgegevens wijzigen</h2>
        
                        <form method="POST" class=" align-items-center ">

                            

                            <div class="row m-1">
                                <?php 
                                
                                if (!empty($data['message'])) { 
                                    
                                    if ($data['message'] == 'Er is iets fout gegaan met het wijzigen van je profiel!' ) {
                                        $alert = 'danger';
                                    } else if ($data['message'] == 'Gebruiker met deze email bestaat al!' ) {
                                        $alert = 'warning';
                                    } else if ($data['message'] == 'Profielgegevens zijn gewijzigd!' ) {
                                        $alert = 'success';
                                    } 
                                    
                                    ?>
                                        <div class="col">
                                            <div class="alert alert-<?php echo $alert; ?>" role="alert">
                                                <span class="text-center"><?php echo $data['message']; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                            
                            </div>

                            <div class="row m-1">
                                <div class="col-md-6">
                                    <label for="postalCodeBillingAddress" ><span class="formLabel">Voornaam:</span></label>
                                    <input type="text" class="form-control request-input" id="firstName" name="firstName" value="<?php echo $data["firstName"];?>" required> 
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="postalCodeBillingAddress" ><span class="formLabel">Achternaam:</span></label>
                                    <input type="text" class="form-control request-input" id="lastName" name="lastName" value="<?php echo $data["lastName"];?>" required>
                                </div>
                            </div>
                            
                            <div class="row m-1">
                                <div class="col">
                                    <label for="editEmail"><span class="formLabel">Email:</span></label>
                                    <input type="text" class="form-control request-input" id="email" name="email"  value="<?php echo $data["email"];?>">
                                </div>
                            </div>
                            

                            <div class="row m-1">
                                <div class="col-md-6">
                                    <label for="editPhoneNumber"><span class="formLabel">Telefoonnummer:</span></label>
                                    <input type="text" class="form-control request-input " id="phoneNumber" name="phoneNumber"  value="<?php echo $data["phoneNumber"];?>" required>
                                </div>
                               <div class="col-12 col-md-6">
                                <label for="editCity"><span class="formLabel">Stad:</span></label>
                                    <input type="text" class="form-control request-input " id="city" name="city"  value="<?php echo $data["city"];?>" required>
                               </div>
                            </div>

                            
                            <div class="row m-1">
                                <div class="col">
                                    <label for="editStreet"><span class="formLabel">Straatnaam:</span></label>
                                    <input type="text" class="form-control request-input " id="street" name="street"  value="<?php echo $data["street"];?>"     required>
                                </div>
                            </div>

                            
                            <div class="row m-1">
                                <div class="col">
                                    <label for="editPremise" ><span class="formLabel">Huisnummer:</span></label>
                                    <input type="text" class="form-control request-input " id="premise" name="premise"  value="<?php echo $data["premise"];?>" required>
                                </div>
                                <div class="col">
                                    <label for="editPostalCode"><span class="formLabel">Postcode:</span></label>
                                    <input type="text" class="form-control request-input " id="postalCode" name="postalCode"  value="<?php echo $data["postalCode"];?>" required>
                                </div>
                            </div>

                            
                            <div class="row m-1">
                                <div class="col">
                                    <label for="editPostalCode"><span class="formLabel">Geslacht:</span></label>
                                    <select class="form-select w-50" aria-label="Default select example" id="gender" name="gender" required>
                                        <option selected></option>
                                        <option value="1" <?php if ($data['gender'] == 'M') echo ' selected="selected"'; ?>>Man</option>
                                        <option value="2"<?php if ($data['gender'] == 'V') echo ' selected="selected"'; ?>>Vrouw</option>
                                        <option value="3"<?php if ($data['gender'] == 'O') echo ' selected="selected"'; ?>>Anders</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row m-1">
                                <div class="col">
                                    <button type="submit" class="submitRequestButton btn btn-primary m-1 my-3">Wijzigen</button>
                                    <a class="cancelButton btn m-1 my-3" href="/profiel">Ga terug</a>
                                </div>
                            </div>
                        </form>
       
        </div></div></div></div>

</div>