<?php
$roles = Application::$app->session->get("roles");
$activeRole = Application::$app->session->get("activeRole");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow mb-3 rounded-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/src/img/logo.svg" alt="" width="100" height="100" class="d-inline-block align-text-bottom">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <?php if (strtolower($activeRole) == "lid") { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/overzicht">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/opdrachten">Jouw opdrachten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/profiel">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/uitloggen" tabindex="-1" aria-disabled="true">Uitloggen</a>
                    </li>
                    <?php
                    if ($roles > 1) {
                    ?>
                    <form action="/role/change" method="POST">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle col-12 col-md-auto" href="#" role="button" id="rolesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $activeRole ?>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-middle" aria-labelledby="rolesDropdown">

                                <?php
                                foreach ($roles as $role) {
                                    if ($role != $activeRole) {
                                ?>
                                        <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" />
                                        <li><input type="submit" name="role" value="<?php echo $role ?>" class="dropdown-item"></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </form>
                    <?php } ?>
                <?php } elseif (strtolower($activeRole) == "coordinator") { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/overzicht">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/leden">Leden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/profiel">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/uitloggen" tabindex="-1" aria-disabled="true">Uitloggen</a>
                    </li>
                    <?php
                    if ($roles > 1) {
                    ?>
                    <form action="/role/change" method="POST">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle col-12 col-md-auto" href="#" role="button" id="rolesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $activeRole ?>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-middle" aria-labelledby="rolesDropdown">

                                <?php
                                foreach ($roles as $role) {
                                    if ($role != $activeRole) {
                                ?>
                                        <input type="hidden" name="destination" value="<?php echo $_SERVER["REQUEST_URI"]; ?>" />
                                        <li><input type="submit" name="role" value="<?php echo $role ?>" class="dropdown-item"></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </form>
                    <?php } ?>
                <?php } elseif (strtolower($activeRole) == "opdrachtgever") { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/overzicht">Overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/opdrachten">Aangevraagde opdrachten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/opdracht/aanvragen" tabindex="-1" aria-disabled="true">Opdracht indienen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/profiel">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/uitloggen" tabindex="-1" aria-disabled="true">Uitloggen</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="/inloggen" tabindex="-1" aria-disabled="true">Inloggen</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>