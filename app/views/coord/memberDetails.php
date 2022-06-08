<?php 
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
                                    <th scope="col">#</th>
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

                    <!-- Statistieken -->
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                    <h2 class="formSectionTitle fw-bold mt-3">Statistieken</h2>
                    <p class="lead text-muted">Hier kunt u statistieken inzien van het lid<p>
                    <table class="table table-sm table-hover w-auto ">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Info</th>
                                    </tr>
                                </thead>
                                    <tr>
                                    <td scope="row">Aantal gelopen opdrachten</td>
                                    <td>:</td>
                                    <td><?php echo 5;?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Ingeschreven opdrachten</td>
                                    <td>:</td>
                                    <td><?php echo 3;?></td>
                                    </tr>   
                
                                    <tr>
                                    <td scope="row">Toegewezen opdrachten</td>
                                    <td>:</td>
                                    <td><?php echo 4;?></td>
                                    </tr>
                            </table>
                    </div>


                    <!-- Locatie -->
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                        <!-- straat en huisnummer toevoegen, maar dummy data eerst aanpassen -->
                        <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" . $item["city"] . "+" . $item["postalCode"] . ""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
                    </div> 
                    <!-- Column 1 end -->
                </div>

                <div class="col">
                     <!-- Column 2 start -->
                                       
                    
                    <div class="container-sm m-1 mt-3 mt-sm-1 border shadow-sm rounded-3 w-auto" >
                    
                    <h2 class="formSectionTitle fw-bold mt-3">Opdrachten</h2>
                    <p class="lead text-muted">Hier vind u lijsten van toegewezen en voor aangemelde opdrachten van het lid<p>
                        
                    <div class="accordion m-3" id="chapters">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="header-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#chapter-1" aria-expended="true" 
                                aria-controls="chapter-1">Toegewezen opdrachten</button>
                            </h2>
                            <div id="chapter-1" class="accordion-collapse collapse show m-2" aria-labelledby="header-1">
                            <h2>Hello</h2>
                                <!-- <?php foreach($data as $request) { ?>  <?php } ?> -->
                            </div>
                        </div>



                        <div class="accordion-item">
                            <h2 class="accordion-header" id="header-2">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#chapter-2" aria-expended="true" 
                                aria-controls="chapter-2">Ingeschreven opdrachten</button>
                            </h2>
                            <div id="chapter-2" class="accordion-collapse collapse show m-2" aria-labelledby="header-2">
                            <h2>Hello</h2>
                                <!-- <?php foreach($data as $request) { ?>  <?php } ?> -->
                            </div>
                        </div>




                    </div>


                    <!-- Toegewezen opdrachten -->
                    <!-- Wachtende opdrachten -->
                        
                    </div> 
                    <!-- Column 2 end  -->
                </div>
            </div>

           
           
        </div>   

            <?php } ?>

         
