<div class="row row-cols-md-1 row-cols-lg-3 g-2 m-2">
    <?php
    if (!empty($data)){
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

        // date comparison
        $date_now = date("Y-m-d"); // this format is string comparable

        $orderdate_now = explode('-', date("Y-m-d"));
            $year_now  = $orderdate_now[0];
            $month_now = $orderdate_now[1];
            $day_now   = $orderdate_now[2];

        $orderdate_request = explode('-', $item['date']);
            $year_request  = $orderdate_request[0];
            $month_request = $orderdate_request[1];
            $day_request   = $orderdate_request[2] - 1;
        
    ?>

        <div class="col-md-12 col-lg-4">
            <div class="customCard card shadow-sm col-12 h-100">
                <div class="customCardBody card-body">
                    <div class="row gx-5">
                        <div class="col col-12">
                            <h5 class="card-title"><?php echo $item["description"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["companyName"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["date"] ?> - <?php echo $item["time"] ?></h6>
                            <h6 class="card-subtitle mb-2"><?php echo $approved ?></h6>
                        </div>
                        <div class="col col-12">
                            <div class="embed-responsive text-center col-12">
                                <iframe class="col-12" src="https://maps.google.com/maps?q=<?php echo "" . $item["pCity"] . "+" . $item["pStreet"] . "+" . $item["pHouseNumber"] . "+" . $item["pPostalCode"] . "" ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-0">
                                <div class="btn-group" role="group" aria-label="Basic example">

                                <?php if ($day_request > $day_now && $month_request >= $month_now && $year_request >= $year_now) { // Wel aanpassen ?> 
                                   <a  class="btn btn-warning text-white col-6" style="z-index: 10" href="/opdracht/<?php echo $item["requestId"];?>/wijzigen">Wijzigen</a>

                                <?php } else { // Niet aanpassen, contact opnemenen met coordinator ?>
                                    <button type="button" class="btn btn-warning text-white col-6" style="z-index: 10" name="updateButton" data-bs-toggle="modal" data-bs-target="#updateRequest<?php echo $item["requestId"]; ?>">Wijzigen</button>
                                <?php } ?>
                                    <button type="button" class="btn btn-danger col-6" style="z-index: 10" name="deleteButton" data-bs-toggle="modal" data-bs-target="#cancelRequest<?php echo $item["requestId"]; ?>">Verwijderen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="customCardList list-group-item"><strong>Speellocatie: </strong> <?php echo $item["pStreet"] . " " . $item["pHouseNumber"] . ", " . $item["pCity"] ?></li>
                    <li class="customCardList list-group-item"><strong>Grimeerlocatie: </strong> <?php echo $item["gStreet"] . " " . $item["gHouseNumber"] . ", " . $item["gCity"] ?></li>
                </ul>
                <a class="stretched-link"  style="z-index: 9" href="/opdracht/<?php echo $item["requestId"] ?>/details"></a>
            </div>


            <div class="modal fade" id="cancelRequest<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="cancelRequestLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cancelRequestLabel">Weet u het zeker?</h5>
                        </div>
                        <div class="modal-body">
                            U staat op het punt een door u gemaakte opdracht te verwijderen. Wilt u verder gaan met deze actie?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Afbreken</button>
                            <a href="/opdracht/<?php echo $item["requestId"] ?>/annuleren"><button type="button" class="nextButton btn">Ga verder</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateRequest<?php echo $item["requestId"]; ?>" tabindex="-1" aria-labelledby="updateRequestLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateRequestLabel">Contact opnemen!</h5>
                        </div>
                        <div class="modal-body">
                            Een opdracht wijzigen moet minimaal 2 dagen van tevoren! Neem contact op met de coordinator!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="cancelButton btn" data-bs-dismiss="modal">Afbreken</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php
    }} else {
        ?>
        <div class="container">
            
            <div class="row">
                    <div class="col">
                        <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                        <h2 class="formSectionTitle fw-bold m-3 text-center">Er zijn momenteel geen opdrachten verbonden aan uw account!</h2>
                        </div>
                    </div>
                </div>
        </div>
    
        <?php }?>
</div>