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
            placeRequestFormContent
            bg-white 
            px-5 
            my-4
            row
            rounded-3
            " id="placeRequestFormContent">
            <img src="/src/img/logo.svg" class="img-fluid mx-auto d-block mt-4 mb-4 w-25 h-25" alt="Logo Lotus">
            <hr class="imgDivider">

            <div class="
                    requestInfoBox 
                    mb-5
                ">
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