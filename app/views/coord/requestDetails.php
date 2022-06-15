<?php 
        if(!empty($data)){
        foreach ($data as $item) {
            if ($item["approved"] == 0) {
                $approved = '<i class="fa fa-envelope text-primary" aria-hidden="true"></i> <span class="text-muted">Aanvraag ontvangen</span>';
            } else if ($item["approved"] == 1) {
                $approved = '<i class="fa fa-clock-o text-warning" aria-hidden="true"></i> <span class="text-muted">In behandeling</span>';
            } else if ($item["approved"] == 2) {
                $approved = '<i class="fa fa-check text-success" aria-hidden="true"></i> <span class="text-muted">Goedgekeurd</span>';
            } else if ($item["approved"] == 3) {
                $approved = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Afgewezen</span>';
            } else if ($item["approved"] == 4) {
                $approved = '<i class="fa fa-times text-danger" aria-hidden="true"></i> <span class="text-muted">Geannuleerd</span>';
            } else if ($item["approved"] == 5) {
                $approved = '<i class="fa fa-bullhorn text-danger" aria-hidden="true"></i> <span class="text-muted">Aangepast</span>';
            }
    ?>
        <div class="container">
                
                


            <div class="row">
                <div class="col">
                     <!-- Column 1 -->
                    <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                
                        <h2 class="formSectionTitle fw-bold mt-3"><?php echo $item["companyName"];?></h2>
                        <p><?php echo $item["description"];?></p>
                        <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>

                        <?php if ($item["approved"] == 0  || $item["approved"] == 5) { ?>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#acceptModal">Accepteren</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#denyModal">Afwijzen</button>
                                <?php } ?>
                        
                        
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
                                    <td scope="row">Datum</td>
                                    <td>:</td>
                                    <td><?php echo $item["date"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Tijd</td>
                                    <td>:</td>
                                    <td><?php echo $item["time"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Stad</td>
                                    <td>:</td>
                                    <td><?php echo $item["pCity"];?> </td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Locatie</td>
                                    <td>:</td>
                                    <td><?php echo "".$item["pStreet"]." ".$item["pHouseNumber"].", ".$item["pPostalCode"].""?> </td>
                                    </tr>

                                    
                                    <tr>
                                    <td scope="row">Grimeerlocatie</td>
                                    <td>:</td>
                                    <td><?php echo "".$item["gStreet"]." ".$item["gHouseNumber"].", ".$item["gPostalCode"].""?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Leden nodig</td>
                                    <td>:</td>
                                    <td><?php echo $item["casualties"];?></td>
                                    </tr>
                            </table>


                            <hr class="dropdown-divider">

                            <h2 class="formSectionTitle fw-bold mt-3">Factuurgegevens</h2>

                            <table class="table table-sm table-hover w-auto ">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"></th>
                                    <th scope="col">Info</th>
                                    </tr>
                                </thead>
                                    <tr>
                                    <td scope="row">Land</td>
                                    <td>:</td>
                                    <td><?php echo $item["bCountry"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Provincie</td>
                                    <td>:</td>
                                    <td><?php echo $item["bProvince"];?></td>
                                    </tr>

                                    <tr>
                                    <td scope="row">Stad</td>
                                    <td>:</td>
                                    <td><?php echo $item["bCity"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Straat</td>
                                    <td>:</td>
                                    <td><?php echo $item["bStreet"];?></td>
                                    </tr>

                                    
                                    <tr>
                                    <td scope="row">Huisnummer</td>
                                    <td>:</td>
                                    <td><?php echo $item["bHouseNumber"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Postcode</td>
                                    <td>:</td>
                                    <td><?php echo $item["bPostalCode"];?></td>
                                    </tr>
                            </table>
                            
                            <?php
                                if (!empty($item["comments"])) {
                                echo '  <hr class="dropdown-divider">
                                        <h2 class="formSectionTitle fw-bold mt-3">Opmerkingen</h2>
                                        <p> '.$item["comments"].'</p>';
                                }
                                ?>

                   
                    </div>
                    <!-- Column 1 end -->
                </div>

                <div class="col">
                     <!-- Column 2 start -->
                    <div class="container-sm m-1 mt-3 mt-sm-1 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Gegevens opdrachtgever</h2>
                                <p>
                                <?php echo  $item["companyName"].' </br>	                                
                                            '.$item["firstName"].' '.$item["lastName"].' </br>
                                            '.$item["clientEmail"].' </br>
                                            '.$item["phoneNumber"]?>
                                            </p>

                    </div>

                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Contactgegevens</h2>
                                <p>
                                <?php echo $item["firstName"].' '.$item["lastName"].' </br>
                                            '.$item["email"].' </br>
                                            '.$item["phoneNumber"]?>
                                            </p>
                    </div>
                    
                    <div class="container-sm m-1 mt-3 mt-sm-4 border shadow-sm rounded-3 w-auto" >
                        <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item mb-3" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . ""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
                            </div>
                    </div> 
                    <!-- Column 2 end  -->
                </div>
            </div>

           
           
        </div>   

            <?php }} else {
                        ?>
                        <div class="container">
                            
                            <div class="row">
                                    <div class="col">
                                        <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                                        <h2 class="formSectionTitle fw-bold m-3 text-center">De opdracht die u zoekt is niet gevonden! Check of het juiste id is meegegeven!</h2>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <?php }?>

        <!-- Modal accept -->
        <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptModalLabel">Weet u het zeker?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Weet je zeker dat je opdracht wilt accepteren?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                    <a href="/opdracht/<?php echo $item["requestId"] ?>/accepteren"><button type="button" class="btn btn-primary" >Ga verder</button></a>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal deny -->
        <div class="modal fade" id="denyModal" tabindex="-1" aria-labelledby="denyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="denyModalLabel">Weet u het zeker?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Weet je zeker dat je deze opdracht wilt afwijzen? Deze actie kan niet ongedaan worden gemaakt.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                    <a href="/opdracht/<?php echo $item["requestId"] ?>/afwijzen"><button type="button" class="btn btn-primary" >Ga verder</button></a>
                </div>
                </div>
            </div>
        </div>

         
