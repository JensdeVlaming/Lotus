<div class="d-flex row g-0 vh-100">
    <div class="d-flex align-items-center justify-content-center">
        <form id="tabFormContent" action="/registreren" method="POST" class="tabFormContent w-25">
            <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mb-5" alt="Logo Lotus">

            <span class="fw-bold sub-title">Maak een nieuw account aan.</span>

            <!-- 
            // TODO correcte gegevens aanvragen en controlles hierop
            // TODO data naar database plaatsen 
            -->

            <div id="tabOne" class="tab tabOne">
                <p class="fw-bold formMiniSectionTitle">Bedrijfsgegevens:</p>
                <label for="" class="small-lable fw-bold">Bedrijfsnaam:</label>
                <input type="text" name="companyCompanyName" id="companyCompanyName" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Bedrijfsnaam" required>
                <label for="" class="small-lable fw-bold">Land:</label>
                <input type="text" name="companyCountry" id="companyCountry" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Land" required>
                <label for="" class="small-lable fw-bold">Provincie:</label>
                <input type="text" name="companyProvince" id="companyProvince" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Provincie" required>
                <label for="" class="small-lable fw-bold">Stad:</label>
                <input type="text" name="companyCity" id="companyCity" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Stad" required>
                <label for="" class="small-lable fw-bold">Straat:</label>
                <input type="text" name="companyStreet" id="companyStreet" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Straat" required>
                <label for="" class="small-lable fw-bold">Huisnummer:</label>
                <input type="text" name="companyHouseNumber" id="companyHouseNumber" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Huisnummer" required>
                <label for="" class="small-lable fw-bold">Postcode:</label>
                <input type="text" name="companyPostalCode" id="companyPostalCode" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Postcode" required>
                <input onclick="nextTab()" type="button" value="Volgende" name="stepOne" id="stepOne" class="tabButton btn btn-lg fw-bold btn-register col-12 mb-2 register-submit mt-3">
            </div>

            <div id="tabTwo" class="tab tabTwo">
                <p class="fw-bold formMiniSectionTitle">Factuurgegevens:</p>
                <label for="" class="small-lable fw-bold">Emailadres:</label>
                <input type="text" name="billingEmailAddress" id="billingEmailAddress" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Emailadres" required>
                <label for="" class="small-lable fw-bold">Land:</label>
                <input type="text" name="billingCountry" id="billingCountry" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Land" required>
                <label for="" class="small-lable fw-bold">Provincie:</label>
                <input type="text" name="billingProvince" id="billingProvince" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Provincie" required>
                <label for="" class="small-lable fw-bold">Stad:</label>
                <input type="text" name="billingCity" id="billingCity" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Stad" required>
                <label for="" class="small-lable fw-bold">Straat:</label>
                <input type="text" name="billingStreet" id="billingStreet" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Straat" required>
                <label for="" class="small-lable fw-bold">Huisnummer:</label>
                <input type="text" name="billingHouseNumber" id="billingHouseNumber" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Huisnummer" required>
                <label for="" class="small-lable fw-bold">Postcode:</label>
                <input type="text" name="billingPostalCode" id="billingPostalCode" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Postcode" required>
                <input onclick="nextTab()" type="button" value="Volgende" name="stepOne" id="stepOne" class="tabButton btn btn-lg fw-bold btn-register col-12 mb-2 register-submit mt-3">
            </div>

            <div id="tabThree" class="tab tabThree">
                <p class="fw-bold formMiniSectionTitle">Persoonlijke gegevens:</p>
                <label for="" class="small-lable fw-bold">Emailadres:</label>
                <input type="text" name="billingEmailAddress" id="billingEmailAddress" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Emailadres" required>
                <label for="" class="small-lable fw-bold">Land:</label>
                <input type="text" name="billingCountry" id="billingCountry" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Land" required>
                <label for="" class="small-lable fw-bold">Provincie:</label>
                <input type="text" name="billingProvince" id="billingProvince" class="stepInputField form-control form-control-md mt-2 mb-3 py-2 px-3 register-input" placeholder="Provincie" required>
                <input onclick="nextTab()" type="button" value="Afronden" name="stepThree" id="stepThree" class="tabButton btn btn-lg fw-bold btn-register col-12 mb-2 register-submit mt-3">
            </div>

            <div class="">
                <input id="submitButton" type="submit" value="Maak account" class="btn btn-lg fw-bold btn-register col-12 mb-2 register-submit d-none mt-3">
            </div>

            <div class="text-center mt-1 mb-4">
                <input type="button" onclick="prevTab()" id="stepBack" value="<" class="btn fw-bold btn-number-back">
                <span id="1" class="btn btn-number btn-number-current fw-bold">1</span>
                <span id="2" class="btn btn-number fw-bold">2</span>
                <span id="3" class="btn btn-number fw-bold">3</span>
                <input type="button" onclick="nextTab()" id="stepNext" value=">" class="btn fw-bold btn-number-next">
            </div>

        </form>
    </div>

    <div class="d-flex align-items-end justify-content-center">
        <p class="fw-bold bottom-text">Of wilt u <a href="/inloggen" class="bottom-link">Inloggen</a> met een bestaand account?</p>
    </div>
</div>

<script type="text/javascript" src="/src/js/tabs.js"></script>