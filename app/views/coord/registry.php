<div class="m-2">
    <a class="btn btn-primary mb-2 col-12 col-md-2" href="/leden/aanmaken">Lid aanmaken</a>
    <div class="row row-cols-md-1 row-cols-lg-3 g-2">
        <?php
        if (!empty($data)) {
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
                                    <h6 class="card-subtitle mb-2 text-muted">Voltooide opdrachten: <?php echo $item["completedAssignment"] ?></h6>
                                </div>
                            </div>
                        </div>
                        <a class="stretched-link" href="/lid/<?php echo $item["email"] ?>/details"></a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="container">

                <div class="row">
                    <div class="col">
                        <div class="container-sm m-1 border shadow-sm rounded-3 w-auto">
                            <h2 class="formSectionTitle fw-bold m-3 text-center">Er zijn nog geen leden!</h2>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>