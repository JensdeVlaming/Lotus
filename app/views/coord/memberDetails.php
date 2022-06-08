<?php 
    print_r($data);
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
                    <table class="table table-sm table-hover w-auto ">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Aantal</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td scope="row">Toegewezen opdrachten</td>
                                    <td>:</td>
                                    <td class="text-center"><?php echo $item["completedAssignment"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Ingeschreven opdrachten</td>
                                    <td>:</td>
                                    <td class="text-center"><?php echo $item["solicitAssignment"];?></td>
                                    </tr>   
                            </table>
                            <hr class="dropdown-divider">

                    <!-- Toegewezen opdrachten -->
                    <div class="accordion accordion-color mt-3 mb-3" id="chapters">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="header-1">
                                <button class="accordion-button bg-light text-dark" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#chapter-1" aria-expended="true" 
                                aria-controls="chapter-1">Toegewezen opdrachten</button>
                            </h2>
                            <div id="chapter-1" class="accordion-collapse collapse show m-2" aria-labelledby="header-1">
                                <!-- <?php foreach($data as $request) { ?>  <?php } ?> -->
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
                                    <?php 
                                    
                                    for ($x = 0; $x <= 10; $x++) { ?>
                                    <tr>
                                    <td scope="row">1</td>
                                    <td>:</td>
                                    <td class="text-center"><a href="/opdracht/3/details-coordinator"><?php echo $item["completedAssignment"];?></a></td>
                                    <td class="text-center">stad</td>
                                    <td class="text-center">date</td>
                                    <td class="text-center">tijd</td>
                                    </tr>
                                      <?php } ?>
                           
                            </table>

                            </div>
                        </div>


                        <!-- Wachtende opdrachten -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="header-2">
                                <button class="accordion-button bg-light text-dark" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#chapter-2" aria-expended="true" 
                                aria-controls="chapter-2">Ingeschreven opdrachten</button>
                            </h2>
                            <div id="chapter-2" class="accordion-collapse collapse show m-2" aria-labelledby="header-2">
                                <!-- <?php foreach($data as $request) { ?>  <?php } ?> -->

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
                                    <?php 
                                    
                                    for ($x = 0; $x <= 10; $x++) { ?>
                                    <tr>
                                    <td scope="row">1</td>
                                    <td>:</td>
                                    <td class="text-center"><a href="/opdracht/3/details-coordinator-toewijzen"><?php echo $item["completedAssignment"];?></a></td>
                                    <td class="text-center">stad</td>
                                    <td class="text-center">date</td>
                                    <td class="text-center">tijd</td>
                                    </tr>
                                      <?php } ?>
                           
                            </table>



                            </div>
                        </div>




                    </div>


                
                  
                        
                    </div> 
                    <!-- Column 2 end  -->
                </div>
            </div>

           
           
        </div>   

            <?php } ?>

         
