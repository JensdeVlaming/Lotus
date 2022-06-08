<div class="m-2">
    <button class="btn btn-primary mb-2 col-12 col-md-2">Lid aanmaken</button>
    <div class="row row-cols-md-1 row-cols-lg-3 g-2">
    <?php
    
    foreach ($data as $item) {
    ?>
    
        <div class="col-md-12 col-lg-4">
            <div class="customCard card shadow-sm col-12 h-100">
                <div class="customCardBody card-body">
                    <div class="row gx-0">
                        <div class="col col-auto">
                            <div data-initials="<?php echo Application::$app->controller->getInitials($item["firstName"], $item["lastName"]) ?>" class="profileIcon"></div>
                        </div>
                        <div class="col">
                            <h5 class="card-title fw-bold"><?php echo $item["firstName"] . " " . $item["lastName"] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["email"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $item["phoneNumber"] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted">Aantal ingeschreven opdrachten: <?php echo $item["completedAssignment"] ?></h6>
                        </div>
                    </div>
                </div>
                <a class="stretched-link" href="/lid/<?php echo $item["requestId"] ?? 1 ?>/details"></a>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>