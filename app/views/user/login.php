<div class="d-flex row g-0 vh-100">
    <div class="d-flex align-items-center justify-content-center ">
        <form method="POST">
            <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mb-5" alt="Logo Lotus">

            <span class="fw-bold">Login op jouw account.</span>
            <input type="email" name="email" class="form-control form-control-lg mt-2 mb-4 py-2 px-3 login-input" placeholder="E-mailadres" value="<?PHP if (isset($data["email"])) {
                                                                                                                                                        echo $data["email"];
                                                                                                                                                    } ?>" />

            <input type="password" name="password" class="form-control form-control-lg mb-4 py-2 px-3 login-input" placeholder="Wachtwoord" />

            <button type="submit" name="req" value="login" class="btn btn-primary btn-lg fw-bold btn-login col-12 mb-2 login-submit">Inloggen</button>

            <?php if (isset($data["error"])) { ?>

                <div class="alert alert-danger" id="alert-login" role="alert">
                    <span class="text-center">E-mailadres of wachtwoord niet geldig.</span>
                </div>

            <?php } ?>
        </form>
    </div>
    <div class="d-flex align-items-end justify-content-center">
        <p class="fw-bold text-secondary"><span class="link-primary">Registreren</span> als opdrachtgever?</p>
    </div>
</div>