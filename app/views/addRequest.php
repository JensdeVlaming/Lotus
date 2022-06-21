<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/src/css/styles.css">
    <title>
        <?php echo SITENAME ?> - Aanvraag plaatsen
    </title>
</head>

<body>

    <form action="" method="post" class="
            d-flex 
            align-items-center 
            justify-content-center
            ">
        <div class="
        formContent
            bg-white 
            px-5 
            my-4
            row
            rounded-3
            " id="formContent">
            <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mt-4 mb-4 w-25 h-25" alt="Logo Lotus">
            <hr class="imgDivider">

            <div class="
                    requestInfoBox 
                    mb-5
                ">











                <div class="businessInfoBox">
                    <label for="" class="
                            mt-2
                            fw-bold">
                        <span class="formSectionTitle">
                            Bedrijfsinformatie:
                        </span>
                    </label>
                    <div class="form-control">
                        <div class="row">
                            <div class="col-xl-12">
                                <div>
                                    <label for="requestName" class="
                                            mt-2
                                        ">
                                        <span class="formLabel">
                                            <span class="requiredField">*</span>Bedrijfsnaam:
                                        </span>
                                    </label>
                                    <input type="text" name="requestName" id="requestName" required class="
                                                form-control
                                                request-input
                                            ">
                                </div>
                            </div>
                            <div class="clientInfoBox">
                                <label for="" class="
                                        mt-2
                                        fw-bold
                                    ">
                                    <span class="formMiniSectionTitle">
                                        Contactpersoon Informatie:
                                    </span>
                                </label>
                                <div class="form-control">
                                    <div class="row">
                                        <!-- <div class="col-xl-12">
                                            <input 
                                                type="checkbox" 
                                                name="clientNameCheckbox" 
                                                id="clientNameCheckbox"
                                                onclick="automateUserDataOnCheck()"
                                            >
                                            <span class="formLabel">
                                                <span class="checkboxText">
                                                    De ingelogde gebruiker is het contactpersoon.
                                                </span>
                                            </span>
                                        </div> -->
                                        <div class="col-xl-6 col-md-12">
                                            <div>
                                                <label for="clientFirstName" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Voornaam:
                                                    </span>
                                                </label>
                                                <input type="text" name="clientFirstName" id="clientFirstName" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div>
                                                <label for="clientLastName" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Achternaam:
                                                    </span>
                                                </label>
                                                <input type="text" name="clientLastName" id="clientLastName" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div>
                                                <label for="clientEmail" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Emailadres:
                                                    </span>
                                                </label>
                                                <input type="mail" name="clientEmail" id="clientEmail" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-12">
                                            <div>
                                                <label for="clientPhoneNumber" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Telefoonnummer:
                                                    </span>
                                                </label>
                                                <input type="tel" name="clientPhoneNumber" id="clientPhoneNumber" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="addresBox">
                                    <label for="" class="
                                            mt-2
                                            fw-bold
                                        ">
                                        <span class="formMiniSectionTitle">
                                            Adres:
                                        </span>
                                    </label>
                                    <div class="form-control">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-12">
                                                <label for="country" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Land:
                                                    </span>
                                                </label>
                                                <input type="text" name="country" id="country" required readonly value="Nederland" class="
                                                        form-control
                                                        request-input
                                                        readonly-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <label for="provinceBusinessAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Provincie:
                                                    </span>
                                                </label>
                                                <select class="
                                                        form-select
                                                        request-input
                                                    " name="provinceBusinessAddress" id="provinceBusinessAddress" required>
                                                    <option id="defaultOptionBusinessAddress" selected></option>
                                                    <option id="DrentheBusinessAddress" value="Drenthe">
                                                        Drenthe
                                                    </option>
                                                    <option id="FlevolandBusinessAddress" value="Flevoland">
                                                        Flevoland
                                                    </option>
                                                    <option id="FrieslandBusinessAddress" value="Friesland">
                                                        Friesland
                                                    </option>
                                                    <option id="GelderlandBusinessAddress" value="Gelderland">
                                                        Gelderland
                                                    </option>
                                                    <option id="GroningenBusinessAddress" value="Groningen">
                                                        Groningen
                                                    </option>
                                                    <option id="LimburgBusinessAddress" value="Limburg">
                                                        Limburg
                                                    </option>
                                                    <option id="NoordBrabantBusinessAddress" value="Noord-Brabant">
                                                        Noord-Brabant
                                                    </option>
                                                    <option id="NoordHollandBusinessAddress" value="Noord-Holland">
                                                        Noord-Holland
                                                    </option>
                                                    <option id="OverijsselBusinessAddress" value="Overijssel">
                                                        Overijssel
                                                    </option>
                                                    <option id="UtrechtBusinessAddress" value="Utrecht">
                                                        Utrecht
                                                    </option>
                                                    <option id="ZeelandBusinessAddress" value="Zeeland">
                                                        Zeeland
                                                    </option>
                                                    <option id="ZuidHollandBusinessAddress" value="Zuid-Holland">
                                                        Zuid-Holland
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <label for="cityBusinessAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Stad:
                                                    </span>
                                                </label>
                                                <input type="text" name="cityBusinessAddress" id="cityBusinessAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <label for="streetBusinessAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Straat:
                                                    </span>
                                                </label>
                                                <input type="text" name="streetBusinessAddress" id="streetBusinessAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="houseNumberBusinessAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Huisnummer:
                                                    </span>
                                                </label>
                                                <input type="number" name="houseNumberBusinessAddress" id="houseNumberBusinessAddress" required class="
                                                        form-control
                                                        request-input
                                                    " min="1">
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="annexBusinessAddress" class="mt-2">
                                                    <span class="formLabel">Toevoeging:</span>
                                                </label>
                                                <input type="text" name="annexBusinessAddress" id="annexBusinessAddress" class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12">
                                                <label for="postalCodeBusinessAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Postcode:
                                                    </span>
                                                </label>
                                                <input type="text" name="postalCodeBusinessAddress" id="postalCodeBusinessAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="addresBox">
                                    <label for="" class="
                                            mt-2
                                            fw-bold
                                        ">
                                        <span class="formMiniSectionTitle">
                                            Factuuradres:
                                        </span>
                                    </label>
                                    <div class="form-control">
                                        <div class="row">
                                            <div class="col-xl-11 col-10">
                                                <input type="checkbox" name="billingAddressCheckbox" id="billingAddressCheckbox" onclick="automateBillingAddressDataOnCheck()">
                                                <span class="formLabel">
                                                    <span class="checkboxText">
                                                        Factuuradres is het bedrijfsadres.
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="col-xl-1 col-2 me-auto">
                                                <div class="text-end" id="hideBillingInfoButton" onclick="hideBillingInfo()"><span id="billingChevron" class="fa fa-chevron-up"></span></div>
                                            </div>
                                            <div class="col-xl-6 col-md-12 d-none billingBox">
                                                <label for="country" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Land:
                                                    </span>
                                                </label>
                                                <input type="text" name="country" id="country" required readonly value="Nederland" class="
                                                        form-control
                                                        request-input
                                                        readonly-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12 d-none billingBox">
                                                <label for="provinceBillingAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Provincie:
                                                    </span>
                                                </label>
                                                <select class="
                                                        form-select
                                                        request-input
                                                    " name="provinceBillingAddress" id="provinceBillingAddress" required>
                                                    <option id="defaultOptionBillingAddress" selected></option>
                                                    <option id="DrentheBillingAddress" value="Drenthe">
                                                        Drenthe
                                                    </option>
                                                    <option id="FlevolandBillingAddress" value="Flevoland">
                                                        Flevoland
                                                    </option>
                                                    <option id="FrieslandBillingAddress" value="Friesland">
                                                        Friesland
                                                    </option>
                                                    <option id="GelderlandBillingAddress" value="Gelderland">
                                                        Gelderland
                                                    </option>
                                                    <option id="GroningenBillingAddress" value="Groningen">
                                                        Groningen
                                                    </option>
                                                    <option id="LimburgBillingAddress" value="Limburg">
                                                        Limburg
                                                    </option>
                                                    <option id="NoordBrabantBillingAddress" value="Noord-Brabant">
                                                        Noord-Brabant
                                                    </option>
                                                    <option id="NoordHollandBillingAddress" value="Noord-Holland">
                                                        Noord-Holland
                                                    </option>
                                                    <option id="OverijsselBillingAddress" value="Overijssel">
                                                        Overijssel
                                                    </option>
                                                    <option id="UtrechtBillingAddress" value="Utrecht">
                                                        Utrecht
                                                    </option>
                                                    <option id="ZeelandBillingAddress" value="Zeeland">
                                                        Zeeland
                                                    </option>
                                                    <option id="ZuidHollandBillingAddress" value="Zuid-Holland">
                                                        Zuid-Holland
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6 col-md-12 d-none billingBox">
                                                <label for="cityBillingAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Stad:
                                                    </span>
                                                </label>
                                                <input type="text" name="cityBillingAddress" id="cityBillingAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12 d-none billingBox">
                                                <label for="streetBillingAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Straat:
                                                    </span>
                                                </label>
                                                <input type="text" name="streetBillingAddress" id="streetBillingAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-3 d-none billingBox">
                                                <label for="houseNumberBillingAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Huisnummer:
                                                    </span>
                                                </label>
                                                <input type="number" name="houseNumberBillingAddress" id="houseNumberBillingAddress" required class="
                                                        form-control
                                                        request-input
                                                    " min="1">
                                            </div>
                                            <div class="col-xl-3 d-none billingBox">
                                                <label for="annexBillingAddress" class="mt-2">
                                                    <span class="formLabel">Toevoeging:</span>
                                                </label>
                                                <input type="text" name="annexBillingAddress" id="annexBillingAddress" class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                            <div class="col-xl-6 col-md-12 d-none billingBox">
                                                <label for="postalCodeBillingAddress" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Postcode:
                                                    </span>
                                                </label>
                                                <input type="text" name="postalCodeBillingAddress" id="postalCodeBillingAddress" required class="
                                                        form-control
                                                        request-input
                                                    ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="sectionDivider">


                <label for="" class="
                        mt-2
                        fw-bold
                    ">
                    <span class="formSectionTitle">
                        Aanvraag Informatie:
                    </span>
                </label>
                <div class="form-control">
                    <div class="row">
                        <div class="requestDetailBox">
                            <label for="" class="
                                    mt-2
                                    fw-bold
                                ">
                                <span class="formMiniSectionTitle">
                                    Aanvraag Details:
                                </span>
                            </label>
                            <div class="form-control">
                                <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                        <div class="">
                                            <label for="summary" class="mt-2">
                                                <span class="formLabel">
                                                    <span class="requiredField">*</span>Korte Omschrijving:
                                                </span>
                                            </label>
                                            <textarea name="summary" id="summary" required class="
                                                form-control
                                                request-input
                                            "></textarea>
                                        </div>
                                    </div>



                                    <div class="col-xl-6 col-md-12">
                                        <div class="">
                                            <label for="comments" class="mt-2">
                                                <span class="formLabel">
                                                    Opmerkingen:
                                                </span>
                                            </label>
                                            <textarea name="comments" id="comments" required class="
                                                form-control
                                                request-input
                                            "></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="">
                                            <label for="playDate" class="mt-2">
                                                <span class="formLabel">
                                                    <span class="requiredField">*</span>Speel Datum:
                                                </span>
                                            </label>
                                            <input type="date" name="playDate" id="playDate" required class="
                                                form-control
                                                request-input
                                            ">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <div class="">
                                            <label for="playTime" class="mt-2">
                                                <span class="formLabel">
                                                    <span class="requiredField">*</span>Speel Tijd:
                                                </span>
                                            </label>
                                            <input type="time" name="playTime" id="playTime" required class="
                                                form-control
                                                request-input
                                            ">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="">
                                            <label for="lotusCasualties" class="mt-2">
                                                <span class="formLabel">
                                                    <span class="requiredField">*</span>Aantal Slachtoffers:
                                                </span>
                                            </label>
                                            <input type="number" name="lotusCasualties" id="lotusCasualties" required class="
                                                form-control
                                                request-input
                                            " min="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="addresBox ">
                            <label for="" class="
                                    mt-2
                                    fw-bold
                                ">
                                <span class="formMiniSectionTitle">
                                    Speel Plaats:
                                </span>
                            </label>
                            <div class="form-control">
                                <div class="row">
                                    <div class="col-xl-6 col-md-12">
                                        <label for="country" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Land:
                                            </span>
                                        </label>
                                        <input type="text" name="country" id="country" required readonly value="Nederland" class="
                                                form-control
                                                request-input
                                                readonly-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <label for="provincePlayGround" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Provincie:
                                            </span>
                                        </label>
                                        <select class="
                                                form-select
                                                request-input
                                            " name="provincePlayGround" id="provincePlayGround" required>
                                            <option id="defaultOptionPlayGround" selected></option>
                                            <option id="DrenthePlayGround" value="Drenthe">
                                                Drenthe
                                            </option>
                                            <option id="FlevolandPlayGround" value="Flevoland">
                                                Flevoland
                                            </option>
                                            <option id="FrieslandPlayGround" value="Friesland">
                                                Friesland
                                            </option>
                                            <option id="GelderlandPlayGround" value="Gelderland">
                                                Gelderland
                                            </option>
                                            <option id="GroningenPlayGround" value="Groningen">
                                                Groningen
                                            </option>
                                            <option id="LimburgPlayGround" value="Limburg">
                                                Limburg
                                            </option>
                                            <option id="NoordBrabantPlayGround" value="Noord-Brabant">
                                                Noord-Brabant
                                            </option>
                                            <option id="NoordHollandPlayGround" value="Noord-Holland">
                                                Noord-Holland
                                            </option>
                                            <option id="OverijsselPlayGround" value="Overijssel">
                                                Overijssel
                                            </option>
                                            <option id="UtrechtPlayGround" value="Utrecht">
                                                Utrecht
                                            </option>
                                            <option id="ZeelandPlayGround" value="Zeeland">
                                                Zeeland
                                            </option>
                                            <option id="ZuidHollandPlayGround" value="Zuid-Holland">
                                                Zuid-Holland
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <label for="cityPlayGround" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Stad:
                                            </span>
                                        </label>
                                        <input type="text" name="cityPlayGround" id="cityPlayGround" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <label for="streetPlayGround" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Straat:
                                            </span>
                                        </label>
                                        <input type="text" name="streetPlayGround" id="streetPlayGround" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="houseNumberPlayGround" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Huisnummer:
                                            </span>
                                        </label>
                                        <input type="number" name="houseNumberPlayGround" id="houseNumberPlayGround" required class="
                                                form-control
                                                request-input
                                            " min="1">
                                    </div>
                                    <div class="col-xl-3">
                                        <label for="annexPlayGround" class="mt-2">
                                            <span class="formLabel">
                                                Toevoeging:
                                            </span>
                                        </label>
                                        <input type="text" name="annexPlayGround" id="annexPlayGround" class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12">
                                        <label for="postalCodePlayGround" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Postcode:
                                            </span>
                                        </label>
                                        <input type="text" name="postalCodePlayGround" id="postalCodePlayGround" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addresBox ">
                            <label for="" class="
                                    mt-2
                                    fw-bold
                                ">
                                <span class="formMiniSectionTitle">
                                    Grimeerlocatie:
                                </span>
                            </label>
                            <div class="form-control">
                                <div class="row">
                                    <div class="col-xl-11 col-10">
                                        <input type="checkbox" name="gatherLocationCheckbox" id="gatherLocationCheckbox" onclick="automateGatherLocationDataOnCheck()">
                                        <span class="formLabel">
                                            <span class="checkboxText">
                                                Grimeerlocatie is de speel plaats.
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-xl-1 col-2 me-auto">
                                        <div class="text-end" id="hideGatherInfoButton" onclick="hideGatherInfo()"><span id="gatherChevron" class="fa fa-chevron-up"></span></div>
                                    </div>
                                    <div class="col-xl-6 col-md-12 d-none gatherBox">
                                        <label for="country" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Land:
                                            </span>
                                        </label>
                                        <input type="text" name="country" id="country" required readonly value="Nederland" class="
                                                form-control
                                                request-input
                                                readonly-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12 d-none gatherBox">
                                        <label for="provinceGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Provincie:
                                            </span>
                                        </label>
                                        <select class="
                                                form-select
                                                request-input
                                            " name="provinceGatherLocation" id="provinceGatherLocation" required>
                                            <option id="defaultOptionGatherLocation" selected></option>
                                            <option id="DrentheGatherLocation" value="Drenthe">
                                                Drenthe
                                            </option>
                                            <option id="FlevolandGatherLocation" value="Flevoland">
                                                Flevoland
                                            </option>
                                            <option id="FrieslandGatherLocation" value="Friesland">
                                                Friesland
                                            </option>
                                            <option id="GelderlandGatherLocation" value="Gelderland">
                                                Gelderland
                                            </option>
                                            <option id="GroningenGatherLocation" value="Groningen">
                                                Groningen
                                            </option>
                                            <option id="LimburgGatherLocation" value="Limburg">
                                                Limburg
                                            </option>
                                            <option id="NoordBrabantGatherLocation" value="Noord-Brabant">
                                                Noord-Brabant
                                            </option>
                                            <option id="NoordHollandGatherLocation" value="Noord-Holland">
                                                Noord-Holland
                                            </option>
                                            <option id="OverijsselGatherLocation" value="Overijssel">
                                                Overijssel
                                            </option>
                                            <option id="UtrechtGatherLocation" value="Utrecht">
                                                Utrecht
                                            </option>
                                            <option id="ZeelandGatherLocation" value="Zeeland">
                                                Zeeland
                                            </option>
                                            <option id="ZuidHollandGatherLocation" value="Zuid-Holland">
                                                Zuid-Holland
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-xl-6 col-md-12 d-none gatherBox">
                                        <label for="cityGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Stad:
                                            </span>
                                        </label>
                                        <input type="text" name="cityGatherLocation" id="cityGatherLocation" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12 d-none gatherBox">
                                        <label for="streetGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Straat:
                                            </span>
                                        </label>
                                        <input type="text" name="streetGatherLocation" id="streetGatherLocation" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-3 d-none gatherBox">
                                        <label for="houseNumberGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Huisnummer:
                                            </span>
                                        </label>
                                        <input type="number" name="houseNumberGatherLocation" id="houseNumberGatherLocation" required class="
                                                form-control
                                                request-input
                                            " min="1">
                                    </div>
                                    <div class="col-xl-3 d-none gatherBox">
                                        <label for="annexGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                Toevoeging:
                                            </span>
                                        </label>
                                        <input type="text" name="annexGatherLocation" id="annexGatherLocation" class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                    <div class="col-xl-6 col-md-12 d-none gatherBox">
                                        <label for="postalCodeGatherLocation" class="mt-2">
                                            <span class="formLabel">
                                                <span class="requiredField">*</span>Postcode:
                                            </span>
                                        </label>
                                        <input type="text" name="postalCodeGatherLocation" id="postalCodeGatherLocation" required class="
                                                form-control
                                                request-input
                                            ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <input type="submit" value="Plaats Aanvraag" name="placeRequest" id="placeRequest" class="
                        submitRequestButton 
                        btn
                        mt-3
                        mb-3
                        mx-auto 
                        d-block
                    ">
            </div>
        </div>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
</script>
<script type="text/javascript" src="/src/js/app.js">
</script>

</html>