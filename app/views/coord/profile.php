<?php 
    if (!empty($data)){
        foreach ($data as $item) {
    if ($item["gender"] === "M") {
        $gender = "Man";
    } else if ($item["gender"] === "V") {
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
                                    <td><?php echo ''.$item["firstName"].'  '.$item["lastName"].'';?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Geslacht</td>
                                    <td>:</td>
                                    <td><?php echo $gender;?></td>
                                    </tr>   
                
                                    <tr>
                                    <td scope="row">email</td>
                                    <td>:</td>
                                    <td><?php echo $item["email"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Telefoonnummer</td>
                                    <td>:</td>
                                    <td><?php echo $item["phoneNumber"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Adres</td>
                                    <td>:</td>
                                    <td><?php echo ''.$item["street"].'  '.$item["premise"].', '.$item["postalCode"].' '.$item["city"].'' ;?></td>
                                    </tr>
                                
                            </table>
                    </div>
                   
                    <!-- Locatie -->
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                        <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" .$item["city"]. "+" .$item["street"]."+" .$item["premise"]."+" .$item["postalCode"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
                    </div> 
                    <!-- Column 1 end -->
                </div>

                <div class="col">
                     <!-- Column 2 start -->
                     <div class="container-sm m-1 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Profiel wijzigen</h2>
                        <p><button type="button" class="btn btn-warning text-white" data-bs-toggle="" data-bs-target="">Profiel wijzigen</button> </p>
                        <button type="button" class="submitRequestButton btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#passwordModal">Profiel wijzigen</button>

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
                    <!-- Column 2 end  -->
                </div>
            </div>

        </div>   


        <!-- MODALS -->
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="passwordModalLabel">Neem contact op!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Een opdracht wijzigen moet minimaal 2 dagen van tevoren! Neem contact op met de coordinator!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ga terug</button>
        </div>
        </div>
    </div>
    </div>

              



         
