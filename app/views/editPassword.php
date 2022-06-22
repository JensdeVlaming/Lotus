<div class="container ">
    
       <!-- edit password -->
        <div class="row justify-content-center">
                <div class="col-sm-5 col-xs-12">
                     <!-- Column 1 -->
                     <!-- Gebruikersgegevens -->
                    <div class="container-sm m-1 border shadow-sm rounded-3">
                        <h2 class="formSectionTitle fw-bold mt-3">Wachtwoord wijzigen</h2>


                            <form method="POST" class=" align-items-center justify-content-center">
                                            
                                <div class="row">
                                <?php 
                                
                                if (!empty($data['message'])) { 
                                    
                                    if ($data['message'] == 'Wachtwoord is onjuist!' ) {
                                        $alert = 'danger';
                                    } else if ($data['message'] == 'Herhaald wachtwoord komt niet overeen!' ) {
                                        $alert = 'warning';
                                    } else if ($data['message'] == 'Uw wachtwoord is gewijzigd!' ) {
                                        $alert = 'success';
                                    } 
                                    
                                    ?>
                                        <div class="col-12">
                                            <div class="alert alert-<?php echo $alert; ?> " role="alert">
                                                <span class="text-center"><?php echo $data['message']; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                                    <button type="submit" class="submitRequestButton btn btn-primary m-1 my-3">Wijzigen</button>
                                    <a class="cancelButton btn m-1 my-3" href="/profiel">Ga terug</a>
                            </form>

        </div></div></div></div>

</div>
