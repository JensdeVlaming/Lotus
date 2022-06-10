    <?php 
        if (!empty($data)) {
        foreach ($data as $item) {
    ?>
        <div class="container">
                
            <div class="row">
                <div class="col">
                     <!-- Column 1 -->
                    <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                
                        <h2 class="formSectionTitle fw-bold mt-3"><?php echo $item["companyName"];?></h2>
                        <p><?php echo $item["description"];?></p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#participateModal">Afmelden</button>
                        
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
                        <h2 class="formSectionTitle fw-bold mt-3">Locatie</h2>
                            <iframe class="mb-3" src="https://maps.google.com/maps?q=<?php echo "".$item["pStreet"]."+".$item["pHouseNumber"]."+".$item["pPostalCode"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>
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

        <!-- Modal Weet u het zeker -->
        <div class="modal fade" id="participateModal" tabindex="-1" aria-labelledby="participateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="participateModalLabel">Afmelden</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Afmelden voor een opdracht het liefst minimaal 2 dagen van tevoren met een geldige reden!

                        <form>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Reden tot afmelding:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terug</button>
                    <a href="/opdracht/<?php echo $item["requestId"] ?>/afmelden"><button class="btn btn-primary" data-bs-target="#confirmationModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Verstuur</button></a>
                    <!--  -->
                </div>
                </div>
            </div>
        </div>

        <!-- Modal verzoek tot afmelding is verstuurd -->
        <div class="modal fade" id="confirmationModalToggle" aria-hidden="true" aria-labelledby="confirmationModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalToggleLabel">Verzoek verstuurd</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Verzoek tot afmelding is verstuurd naar de coördinator. Afmelding is pas compleet wanneer het verzoek is goedgekeurd!
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#confirmationModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Ga verder</button>
                </div>
                </div>
            </div>
        </div>                       
    



         
