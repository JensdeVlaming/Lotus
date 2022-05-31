<?php require '..\database\dbconnection.php'; ?>
<?php require '..\header.php'; ?>

<?php
$query = "SELECT * FROM request WHERE approved = 1";
$result = $conn->query($query); ?>

<section class='nav-buttons'>
    <button>Jouw opdrachten</button>
    <button>Nieuwe opdrachten</button>
</section>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

<section class='cards' width='20 rem'>
    <div class="card">
        <div class="row m-2 ">
            <div class="col-md-3">
                <div class="card-det">
                    <h3><?php echo "" . $row['requestName'] . "" ?></h3>
                    <h4><?php echo "" . $row['playDate'] . "" ?></h4>
                    <h4><?php echo "" .$row['playGround']. "" ?></h4>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card-map">
                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 160px">
                      <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                          style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card-registration text-center">
                    <button class="button">Inschrijven </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
                        }
  } else {
    echo "0 results";
  }

  $conn->close();
?>