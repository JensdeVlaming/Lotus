<?php 
    include_once '../header.php';
?>

    <section class="details">
        <div class="container border shadow-lg rounded-3" style="width: 50%;">
            <div class="det-req">
                
                    <?php 
                        require_once "GetReqDet.php"
                    ?>

                <h1><?php echo "".$data['companyName'].""?> </h1>
                 <p class="lead"><?php echo "".$data['summary'].""?> </p>
                 <form method="POST">
                   <input type="submit" class="btn btn-warning" name="solicit" value="Aanmelden">
                 </form>
                 <hr class="dropdown-divider">
                 <h2>Details</h2>
                 <p>
                     <table class="table">
                     <thead>
                     <tr>
                     <th scope="col">#</th>
                     <th scope="col">Info</th>
                     </tr>
                     </thead>
                     <tr>
                     <td scope="row">PlayDate</td>
                     <td><?php echo "".$data["playDate"].""?></td>
                     </tr>
 
                     <tr>
                     <td scope="row">PlayTime</td>
                     <td><?php echo "".$data["playTime"].""?></td>
                     </tr>
 
                     <tr>
                     <td scope="row">PlayGround</td>
                     <td><?php echo "".$data["playGround"].""?></td>
                     
                     </tr>
 
                     <tr>
                     <td scope="row">Leden nodig</td>
                     <td><?php echo "".$data["lotusCasualties"].""?></td>
                     
                     </tr>
                 </table>
                 </p>';
 
         <!-- // echo gegevens opdrachtgever -->
         <h2>Gegevens opdrachtgever</h2>
               <p>
               <?php echo "".$data["firstName"].' '.$data["lastName"].' </br>
               '.$data["clientEmail"].' </br>
               '.$data["phonenumber"].""?>
               </p>
         
 
 
         <!-- if comments is filled echo comments header and info -->
         <?php
         if (!empty($data["comments"])) {
           echo '<h2>Opmerkingen</h2>
                 <p> '.$data["comments"].'</p>';
         }
         ?>
             
         <!-- // echo google maps -->
         <hr class="dropdown-divider">
               <h2>Google Maps</h2>
               <p>
               <iframe src="https://maps.google.com/maps?q=<?php echo "".$data["playGround"].""?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                   style="border:0" allowfullscreen></iframe>
               </p>
               


            </div>
        </div>
    </section>

<?php 
    include_once '../footer.php';
?>