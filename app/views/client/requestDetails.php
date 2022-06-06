<?php 
         if(isset($_POST['delete'])) {
          
            // $conn = mysqli_connect($servername, $username, $password,$db);
            //  $_SESSION["request"] & $_SESSION["userId"]
            // $_SESSION["userEmail"]
            // $sqlAlreadydelete = "SELECT * FROM delete WHERE requestId = 10 AND email = 'kasper@lotus.nl';";
            // $sqlAlreadydeleteResult = mysqli_query($conn, $sqlAlreadydelete);
    
            // if (mysqli_num_rows($sqlAlreadydeleteResult) > 0) { 
            //   echo '<script> alert("Je bent al aangemeld voor deze opdracht!")</script>';
            // } else {
            //   // $sqldelete = "INSERT INTO delete VALUES (".$row["requestId"].",20);";
            //   echo '<script> alert("Jij bent aangemeld voor deze opdracht!")</script>';
            // }
            echo"delete button is called";
        }
        print_r($data);
    ?>
        
            <div class="container-sm m-auto border shadow-lg rounded-3" >
                <div class="row gx-5">
                    <div class="col col-12 col-md-auto">
                        <h2>CompanyName temp</h2>
                        <p>description</p>
                        <button type="button" class="btn btn-success " style="z-index: 10" data-bs-toggle="modal" data-bs-target="#cancelModal<?php echo $data["requestId"]; ?>">Aanmelden</button>

                        
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
        <div class="modal fade" id="cancelModal<?php echo $data["requestId"]; ?>" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelModalLabel">Weet u het zeker?</h5>
                    </div>
                    <div class="modal-body">
                        Weet je zeker dat je je deze opdracht wilt annuleren? Deze actie kan niet ongedaan worden.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Annuleren</button>
                        <a href="/opdracht/<?php echo $data["requestId"] ?>/annuleren"><button type="button" class="nextButton btn">Ga verder</button></a>
                    </div>
                </div>
            </div>
        </div>
