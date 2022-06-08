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
                    <h2 class="formSectionTitle fw-bold mt-3">Statistieken</h2>
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
                                    <td scope="row">Aangemelde opdrachten</td>
                                    <td>:</td>
                                    <td><?php echo 3;?></td>
                                    </tr>   
                
                                    <tr>
                                    <td scope="row">Toegewezen opdrachten</td>
                                    <td>:</td>
                                    <td><?php echo 4;?></td>
                                    </tr>

                                    <!-- <tr>
                                    <td scope="row">Telefoonnummer</td>
                                    <td>:</td>
                                    <td><?php echo $item["phoneNumber"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Adres</td>
                                    <td>:</td>
                                    <td><?php echo ''.$item["street"].'  '.$item["premise"].', '.$item["postalCode"].' '.$item["city"].'' ;?></td>
                                    </tr> -->
                                
                            </table>
                    </div>

                    
                    
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                    
                    <h2 class="formSectionTitle fw-bold mt-3">Opdrachten</h2>
                        
                    </div> 
                    <!-- Column 2 end  -->
                </div>
            </div>

           
           
        </div>   

            <?php } ?>

         
