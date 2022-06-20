<div class="d-flex row g-0 vh-100">
    <div class="d-flex align-items-center justify-content-center ">
        <form action="/registreren" method="POST">
            <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mb-5" alt="Logo Lotus">

            <span class="fw-bold sub-title">Maak een nieuw account aan.</span>

            <!-- 
            // TODO correcte gegevens aanvragen en controlles hierop
            // TODO data naar database plaatsen 
            -->

            <div id="tabOne" class="tabOne">
                <p class="fw-bold formMiniSectionTitle">Bedrijfsgegevens:</p>
                <input type="text" name="firstName" id="firstName" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Voornaam" required>
                <input type="text" name="lastName" id="lastName" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Achternaam" required>
                <input type="mail" name="email" id="email" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Emailadres" required>
                <input type="password" name="password" id="password" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Wachtwoord" required>
                <input onclick="nextTab()" type="button" value="Volgende" name="stepOne" id="stepOne" class="btn btn-lg fw-bold btn-register col-12 mb-2 register-submit">
            </div>

            <div id="tabTwo" class="tabTwo">
                <p class="fw-bold formMiniSectionTitle">Bedrijfsgegevens:</p>
                <input type="text" name="firstName" id="firstName" class="stepTwoInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Voornaam" required>
                <input type="text" name="lastName" id="lastName" class="stepTwoInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Achternaam" required>
                <input onclick="nextTab()" type="button" value="Volgende" name="stepTwo" id="stepTwo" class="btn btn-lg fw-bold btn-register col-12 mb-2 register-submit">
            </div>

            <div id="tabThree" class="tabThree">
                <p class="fw-bold formMiniSectionTitle">Bedrijfsgegevens:</p>
                <input type="text" name="firstName" id="firstName" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Voornaam" required>
                <input type="text" name="lastName" id="lastName" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Achternaam" required>
                <input type="mail" name="email" id="email" class="stepOneInputField form-control form-control-lg mt-2 mb-3 py-2 px-3 register-input" placeholder="Emailadres" required>
                <input onclick="nextTab()" type="submit" value="Afronden" name="stepThree" id="stepThree" class="btn btn-lg fw-bold btn-register col-12 mb-2 register-submit">
            </div>

            <div class="text-center mt-1 mb-4">
                <input type="button" onclick="prevTab()" id="stepBack" value="<" class="btn fw-bold btn-number-back">
                <span id="1" class="btn btn-number btn-number-current fw-bold">1</span>
                <span id="2" class="btn btn-number fw-bold">2</span>
                <span id="3" class="btn btn-number fw-bold">3</span>
                <span class="btn fw-bold hide-this">></span>
            </div>

        </form>
    </div>

    <div class="d-flex align-items-end justify-content-center">
        <p class="fw-bold bottom-text">Of wilt u <a href="/inloggen" class="bottom-link">Inloggen</a> met een bestaand account?</p>
    </div>
</div>