    <?php 
        foreach ($data as $item) {
    ?>
        <div class="container">
                
            <div class="row">
                <div class="col">
                     <!-- Column 1 -->
            <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                
                        <h2 class="formSectionTitle fw-bold"><?php echo $item["companyName"];?></h2>
                        <p><?php echo $item["description"];?></p>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#participateModal">Aanmelden</button>
                        
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
                                    <td><?php echo $item["date"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayTime</td>
                                    <td>:</td>
                                    <td><?php echo $item["time"];?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayGround</td>
                                    <td>:</td>
                                    <td><?php echo "".$item["pStreet"]." ".$item["pHouseNumber"].", ".$item["pPostalCode"].""?> </td>
                                    </tr>

                                    
                                    <tr>
                                    <td scope="row">GrimeGround</td>
                                    <td>:</td>
                                    <td><?php echo "".$item["gStreet"]." ".$item["gHouseNumber"].", ".$item["gPostalCode"].""?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Leden nodig</td>
                                    <td>:</td>
                                    <td><?php echo $item["casualties"];?></td>
                                    </tr>
                            </table>
                            
                            <?php
                                if (!empty($item["comments"])) {
                                echo '<h2 class="formSectionTitle fw-bold">Opmerkingen</h2>
                                        <p> '.$item["comments"].'</p>';
                                }
                                ?>

                   
            </div>
            <!-- Column 1 end -->
                </div>

                <div class="col">
                     <!-- Column 2 start -->
            <div class="container-sm m-1 border shadow-sm rounded-3 w-auto" >
                <h2 class="formSectionTitle fw-bold">Gegevens opdrachtgever</h2>
                        <p>
                        <?php echo $item["firstName"].' '.$item["lastName"].' </br>
                                    '.$item["clientEmail"].' </br>
                                    '.$item["phoneNumber"]?>
                                    </p>
            </div>
            
            <div class="container-sm m-1 border shadow-sm rounded-3 w-auto" >
              
                <h2 class="formSectionTitle fw-bold">Google Maps</h2>
                            <iframe src="https://maps.google.com/maps?q=<?php echo "".$item["pStreet"]."+".$item["pHouseNumber"]."+".$item["pPostalCode"].""?>?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
            </div> 
            <!-- Column 2 end  -->
                </div>
        </div>

           
           
        </div>   

            <?php } ?>

        <!-- Modal -->
            <div class="modal fade" id="participateModal" tabindex="-1" aria-labelledby="participateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="participateModalLabel">Weet u het zeker?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Weet je zeker dat je je wilt aanmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                    <a href="/opdracht/<?php echo $item["requestId"] ?>/aanmelden"><button type="button" class="btn btn-primary" >Ga verder</button></a>
                </div>
                </div>
            </div>
            </div>

         
