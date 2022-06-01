<?php 
    include_once '../header.php';
?>

    <?php 
        $embed = "&t=&z=13&ie=UTF8&iwloc=&output=embed";
        if(isset($_POST['requests'])) {
            header("location: ../client/opdrg.home.php"); }

        if(isset($_POST['newReq'])) {
            header("location: ../client/newReq.php");
        }
    ?>

    <section class="container text-center">
        <form method="POST">
            <input type="submit" class="btn btn-outline-primary btn-lg" name="requests" value="Jouw opdrachten">
            <input type="submit" class="btn btn-outline-dark btn-lg" name="newReq" value="Nieuwe opdrachten">
        </form>
        <hr class="dropdown-divider">

    </section>

    <section class='container cards'>
        <?php 
            require_once "getAllYourRequests.php";
            
            $isApproved;
            if ($data["approved"] == 1) {
                $isApproved = "checkmark";
            } else if ($data["approved"] == 0) {
                $isApproved ="xmark";
            }
        ?>

        <div class="card shadow-lg m-3 mx-auto" style="width: 30rem;">
            <div class="row m-2 ">
                <div class="col-md-3">
                    <div class="card-det">
                    <h3 style="height:100px"><?php echo "". $data["clientEmail"].""?></h3>
                    <h4><?php echo "". $data["playDate"].""?></h4>
                    <h4><?php echo "". $data["playGround"].""?></h4>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card-map"> 
                        <div id="map-container-google-1" class="z-depth-1-half map-container border" style="height: 160px">
                        <iframe src="https://maps.google.com/maps?q=<?php echo "". $data["playGround"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                            style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card-approval">
                        <p>Geaccepteerd door coördinator: <img src="/src/img/<?php echo "".$isApproved.""?>.png" class="img-thumbnail" alt="..."></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
    include_once '../footer.php';
?>