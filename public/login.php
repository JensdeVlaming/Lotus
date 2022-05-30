<?php

session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="src/css/styles.css">


    <title>Lotus | Login</title>
</head>

<body>
    <div class="d-flex row g-0 vh-100">
        <div class="d-flex align-items-center justify-content-center ">
            <form>
                <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mb-5" alt="Logo Lotus">

                <span class="fw-bold">Login op jouw account.</span>
                <input type="email" id="formEmail" class="form-control form-control-lg mt-2 mb-4 py-2 px-3 login-input" placeholder="E-mailadres" />

                <input type="password" id="formPassword" class="form-control form-control-lg mb-4 py-2 px-3 login-input" placeholder="Wachtwoord" />

                <button type="button" class="btn btn-primary btn-lg fw-bold btn-login col-12 mb-4 login-submit">Inloggen</button>

                <?php if (isset($_SESSION['login_cred_wrong']) && $_SESSION['login_cred_wrong']) { ?>
                    
                    <div class="alert alert-danger" role="alert">
                        <span class="text-center">Inloggegevens foutief</span>
                    </div>

                <?php } ?>
            </form>
        </div>
        <div class="d-flex align-items-end justify-content-center">
            <p class="fw-bold text-secondary"><span class="link-primary">Registreren</span> als opdrachtgever?</p>
        </div>
    </div>

    <script>
        $('#topScroll').delay(5000).fadeIn(400);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>


</html>