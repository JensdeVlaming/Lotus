<div class="row d-flex justify-content-center mx-2">
    <div class="col col-md-4 col-sm-4">
        <h1 class="text-center fw-bold">Lid aanmaken</h1>
        <hr>
        <form method="POST">
            <input type="email" class="form-control mb-2 createMember-input" name="email" placeholder="E-mailadres" required>
            <div class="input-group">
                <input type="text" class="form-control mb-2 me-1 createMember-input" name="firstName" placeholder="Voornaam" required>
                <input type="text" class="form-control mb-2 ms-1 createMember-input" name="lastName" placeholder="Achternaam" required>
            </div>
            <div class="input-group">
                <input type="text" class="form-control mb-2 me-1 createMember-input" name="street" placeholder="Straat" required>
                <input type="text" class="form-control mb-2 ms-1 createMember-input" name="premise" placeholder="Huisnummer" required>
            </div>
            <input type="text" class="form-control mb-2 createMember-input" name="city" placeholder="Stad" required>
            <input type="text" class="form-control mb-2 createMember-input" name="postalCode" placeholder="Postcode" required>
            <input type="text" class="form-control mb-2 createMember-input" name="phoneNumber" placeholder="Telefoonnummer" required>
            <select class="form-select createMember-select mb-2" name="gender" required>
                <option selected disabled hidden value="">Geslacht</option>
                <option value="M">Man</option>
                <option value="V">Vrouw</option>
                <option value="X">Anders</option>
            </select>
            <input type="submit" class="btn btn-primary col-12 mb-2" value="Aanmaken">
            <?php if (isset($data["error"])) { ?>

                <div class="alert alert-danger" id="alert-login" role="alert">
                    <span class="text-center"><?php echo $data["error"]; ?></span>
                </div>

            <?php } ?>
        </form>
    </div>
</div>