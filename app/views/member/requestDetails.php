    <?php 
         if(isset($_POST['solicit'])) {
          
            // $conn = mysqli_connect($servername, $username, $password,$db);
            //  $_SESSION["request"] & $_SESSION["userId"]
            // $_SESSION["userEmail"]
            // $sqlAlreadySolicit = "SELECT * FROM solicit WHERE requestId = 10 AND email = 'kasper@lotus.nl';";
            // $sqlAlreadySolicitResult = mysqli_query($conn, $sqlAlreadySolicit);
    
            // if (mysqli_num_rows($sqlAlreadySolicitResult) > 0) { 
            //   echo '<script> alert("Je bent al aangemeld voor deze opdracht!")</script>';
            // } else {
            //   // $sqlSolicit = "INSERT INTO solicit VALUES (".$row["requestId"].",20);";
            //   echo '<script> alert("Jij bent aangemeld voor deze opdracht!")</script>';
            // }
            echo"solicit button is called";
        }
        print_r($data);
    ?>
        
            <div class="container-sm m-auto border shadow-lg rounded-3" >
                <div class="row gx-5">
                    <div class="col col-12 col-md-auto">
                        <h2>CompanyName temp</h2>
                        <p>description</p>
                        <button type="button" class="btn btn-success " style="z-index: 10" data-bs-toggle="modal" data-bs-target="#participateModal<?php echo $data["requestId"]; ?>">Aanmelden</button>

                        
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
                                    <td><?php echo "".$data["date"].""?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayTime</td>
                                    <td>:</td>
                                    <td><?php echo "date"?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">PlayGround</td>
                                    <td>:</td>
                                    <td><?php echo "date"?></td>
                                    </tr>

                                    
                                    <tr>
                                    <td scope="row">GrimeGround</td>
                                    <td>:</td>
                                    <td>
                                        <?php echo "date"?></td>
                                    </tr>
                
                                    <tr>
                                    <td scope="row">Leden nodig</td>
                                    <td>:</td>
                                    <td><?php echo "date"?></td>
                                    </tr>
                            </table> 

                    </div>
                    <div class="col col-12 col-md-auto">
                        <hr class="dropdown-divider">
                        <!-- // echo gegevens opdrachtgever -->
                        <h2>Gegevens opdrachtgever</h2>

                        <hr class="dropdown-divider">
                        <h2>Google Maps</h2>
                            <iframe src="https://maps.google.com/maps?q=Breda+Heinoord+7+4824LT?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                                        style="border:0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="participateModal<?php echo $data["requestId"]; ?>" tabindex="-1" aria-labelledby="participateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="participateModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        Weet je zeker dat je je wilt aanmelden voor deze opdracht? Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $data["requestId"] ?>/aanmelden"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>

         
