<?php 

foreach($data as $item) {
    
    $cSplit = str_split($item["cHouseNumber"]);
    $gSplit = str_split($item["gHouseNumber"]);
    $bSplit = str_split($item["bHouseNumber"]);
    $pSplit = str_split($item["pHouseNumber"]);

    $c = count($cSplit);
    $g = count($gSplit);
    $b = count($bSplit);
    $p = count($pSplit);
    
    $cHouseNumber = "";
    $gHouseNumber = "";
    $bHouseNumber = "";
    $pHouseNumber = "";

    if (!preg_match('/[^A-Za-z]/', $cSplit[$c-1]))
        {
            $cPremise = $cSplit[$c-1];
            for ($x = 0; $x < $c-1 ; $x++) {$cHouseNumber .= $cSplit[$x];}
        } else {
            $cPremise = "";
            $cHouseNumber = $item["cHouseNumber"];
        }

    if (!preg_match('/[^A-Za-z]/', $gSplit[$g-1])) 
        {
            $gPremise = $gSplit[$g-1];
            for ($x = 0; $x < $g-1 ; $x++) {$gHouseNumber .= $gSplit[$x];}
        } else {
            $gPremise = "";
            $gHouseNumber = $item["gHouseNumber"];
        }

    if (!preg_match('/[^A-Za-z]/', $bSplit[$b-1]))
        {
            $bPremise = $bSplit[$b-1];
            for ($x = 0; $x < $b-1 ; $x++) {$bHouseNumber .= $bSplit[$x];}
        } else {
            $bPremise = "";
            $bHouseNumber = $item["bHouseNumber"];
        }

    if (!preg_match('/[^A-Za-z]/', $pSplit[$p-1]))
        {
            $pPremise = $pSplit[$p-1];
            for ($x = 0; $x < $p-1 ; $x++) {$pHouseNumber .= $pSplit[$x];}
        } else {
            $pPremise = "";
            $pHouseNumber = $item["pHouseNumber"];
        }

// Variables
    // request
    $requestId = $item["requestId"];
    $description = $item["description"];
    $comments = $item["comments"];
    $date = $item["date"];
    $time = $item["time"];
    $casualties = $item["casualties"];
    $postDate = $item["postDate"];
    $clientEmail = $item["clientEmail"];

    // company
    $companyId = $item['companyId'];
    $companyName = $item["companyName"];
    $cCountry = $item["cCountry"];
    $cProvince = $item["cProvince"];
    $cCity = $item["cCity"];
    $cStreet = $item["cStreet"];
    $cPostalCode = $item["cPostalCode"];

    // grimeLocation
    $grimeLocationId=$item['grimeLocationId'];
    $gCountry = $item["gCountry"];
    $gProvince = $item["gProvince"];
    $gCity = $item["gCity"];
    $gStreet = $item["gStreet"];
    $gPostalCode = $item["gPostalCode"];

    // playGround
    $playGroundId = $item['playGroundId'];
    $pCountry = $item["pCountry"];
    $pProvince = $item["pProvince"];
    $pCity = $item["pCity"];
    $pStreet = $item["pStreet"];
    $pPostalCode = $item["pPostalCode"];

    // contact
    $contactId = $item['contactId'];
    $firstName = $item["firstName"];
    $lastName = $item["lastName"];
    $email = $item["email"];
    $phoneNumber = $item["phoneNumber"];

    // Billing
    $billingAddressId = $item['billingAddressId'];
    $bCountry = $item["bCountry"];
    $bProvince = $item["bProvince"];
    $bCity = $item["bCity"];
    $bStreet = $item["bStreet"];
    $bPostalCode = $item["bPostalCode"];

     // date comparison variables
     $date_now = date("Y-m-d");
     $date_request = date('Y-m-d', strtotime('-1 days', strtotime($item['date'])));  
        
    }
?>

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
                                            <input 
                                            name="requestId" 
                                            id="requestId"
                                            required
                                            readonly
                                            class="
                                                form-control
                                                request-input
                                                w-25
                                                text-center
                                                d-none
                                            "
                                            value=<?php echo $requestId;?>
                                        >

                                            <div class="">
                                                <label for="summary" class="mt-2">
                                                    <span class="formLabel">
                                                        <span class="requiredField">*</span>Korte Omschrijving:
                                                    </span>
                                                </label>
                                                <textarea name="summary" id="summary" required class="
                                                form-control
                                                request-input
                                            "><?php echo $description;?></textarea>
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
                                            "><?php echo $comments;?></textarea>
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
                                            "
                                            value="<?php echo $date; ?>" 
                                            >
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
                                            "
                                            value="<?php echo $time; ?>" 
                                            >
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
                                            " min="1"
                                            value="<?php echo $casualties; ?>" 
                                            >
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
                                            <input 
                                                name="playGroundId" 
                                                id="playGroundId"
                                                required
                                                readonly
                                                class="
                                                    form-control
                                                    request-input
                                                    w-25
                                                    text-center
                                                    d-none
                                                "
                                                value=<?php echo $playGroundId;?>
                                            >
                                            <label for="country" class="mt-2">
                                                <span class="formLabel">
                                                    <span class="requiredField">*</span>Land:
                                                </span>
                                            </label>
                                            <input type="text" name="country" id="country" required readonly value="<?php echo $pCountry;?>" class="
                                                form-control
                                                request-input
                                                readonly-input
                                            "
                                            
                                            >
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
                                            <option id="defaultOptionPlayGround" selected=></option>
                                            <option id="DrenthePlayGround" value="Drenthe" <?php if ($pProvince == 'Drenthe') echo ' selected="selected"'; ?>>
                                                Drenthe
                                            </option>
                                            <option id="FlevolandPlayGround" value="Flevoland" <?php if ($pProvince == 'Flevoland') echo ' selected="selected"'; ?>>
                                                Flevoland
                                            </option>
                                            <option id="FrieslandPlayGround" value="Friesland" <?php if ($pProvince == 'Friesland') echo ' selected="selected"'; ?>>
                                                Friesland
                                            </option>
                                            <option id="GelderlandPlayGround" value="Gelderland" <?php if ($pProvince == 'Gelderland') echo ' selected="selected"'; ?>>
                                                Gelderland
                                            </option>
                                            <option id ="GroningenPlayGround" value="Groningen" <?php if ($pProvince == 'Groningen') echo ' selected="selected"'; ?>>
                                                Groningen
                                            </option>
                                            <option id="LimburgPlayGround" value="Limburg" <?php if ($pProvince == 'Limburg') echo ' selected="selected"'; ?>>
                                                Limburg
                                            </option>
                                            <option id="NoordBrabantPlayGround" value="Noord-Brabant" <?php if ($pProvince == 'Noord-Brabant') echo ' selected="selected"'; ?>>
                                                Noord-Brabant
                                            </option>
                                            <option id="NoordHollandPlayGround" value="Noord-Holland" <?php if ($pProvince == 'Noord-Holland') echo ' selected="selected"'; ?>>
                                                Noord-Holland
                                            </option>
                                            <option id="OverijsselPlayGround" value="Overijssel" <?php if ($pProvince == 'Overijssel') echo ' selected="selected"'; ?>>
                                                Overijssel
                                            </option>
                                            <option id="UtrechtPlayGround" value="Utrecht" <?php if ($pProvince == 'Utrecht') echo ' selected="selected"'; ?>>
                                                Utrecht
                                            </option>
                                            <option id="ZeelandPlayGround" value="Zeeland" <?php if ($pProvince == 'Zeeland') echo ' selected="selected"'; ?>>
                                                Zeeland
                                            </option>
                                            <option id="ZuidHollandPlayGround" value="Zuid-Holland" <?php if ($pProvince == 'Zuid-Holland') echo ' selected="selected"'; ?>>
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
                                            "
                                            value="<?php echo $pCity; ?>"
                                            >
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
                                            "
                                            value="<?php echo $pStreet; ?>"
                                            >
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
                                            " min="1"
                                            value="<?php echo $pHouseNumber; ?>"
                                            >
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
                                            "
                                            value="<?php echo $pPremise; ?>"
                                            >
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
                                            "
                                            value="<?php echo $pPostalCode; ?>"
                                            >
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
                                        <input 
                                            name="grimeLocationId" 
                                            id="grimeLocationId"
                                            required
                                            readonly
                                            class="
                                                form-control
                                                request-input
                                                w-25
                                                text-center
                                                d-none
                                            "
                                            value=<?php echo $grimeLocationId;?>
                                        >

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
                                            "
                                            value="<?php echo $gCountry; ?>"
                                            >
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
                                            <option id="DrentheGatherLocation" value="Drenthe" <?php if ($gProvince == 'Drenthe') echo ' selected="selected"'; ?>>
                                                Drenthe
                                            </option>
                                            <option id="FlevolandGatherLocation" value="Flevoland" <?php if ($gProvince == 'Flevoland') echo ' selected="selected"'; ?>>
                                                Flevoland
                                            </option>
                                            <option id="FrieslandGatherLocation" value="Friesland" <?php if ($gProvince == 'Friesland') echo ' selected="selected"'; ?>>
                                                Friesland
                                            </option>
                                            <option id="GelderlandGatherLocation" value="Gelderland" <?php if ($gProvince == 'Gelderland') echo ' selected="selected"'; ?>>
                                                Gelderland
                                            </option>
                                            <option id ="GroningenGatherLocation" value="Groningen" <?php if ($gProvince == 'Groningen') echo ' selected="selected"'; ?>>
                                                Groningen
                                            </option>
                                            <option id="LimburgGatherLocation" value="Limburg" <?php if ($gProvince == 'Limburg') echo ' selected="selected"'; ?>>
                                                Limburg
                                            </option>
                                            <option id="NoordBrabantGatherLocation" value="Noord-Brabant" <?php if ($gProvince == 'Noord-Brabant') echo ' selected="selected"'; ?>>
                                                Noord-Brabant
                                            </option>
                                            <option id="NoordHollandGatherLocation" value="Noord-Holland" <?php if ($gProvince == 'Noord-Holland') echo ' selected="selected"'; ?>>
                                                Noord-Holland
                                            </option>
                                            <option id="OverijsselGatherLocation" value="Overijssel" <?php if ($gProvince == 'Overijssel') echo ' selected="selected"'; ?>>
                                                Overijssel
                                            </option>
                                            <option id="UtrechtGatherLocation" value="Utrecht" <?php if ($gProvince == 'Utrecht') echo ' selected="selected"'; ?>>
                                                Utrecht
                                            </option>
                                            <option id="ZeelandGatherLocation" value="Zeeland" <?php if ($gProvince == 'Zeeland') echo ' selected="selected"'; ?>>
                                                Zeeland
                                            </option>
                                            <option id="ZuidHollandGatherLocation" value="Zuid-Holland" <?php if ($gProvince == 'Zuid-Holland') echo ' selected="selected"'; ?>>
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
                                            "
                                            value="<?php echo $gCity; ?>"
                                            >
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
                                            "
                                            value="<?php echo $gStreet; ?>"
                                            >
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
                                            " min="1"
                                            value="<?php echo $gHouseNumber; ?>"
                                            >
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
                                            "
                                            value="<?php echo $gPremise; ?>"
                                            >
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
                                            "value="<?php echo $gPostalCode; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                <input type="submit" value="Opdracht aanpassen" name="editRequest" id="editRequest" class="submitRequestButton btn mt-3 mb-3 mx-auto d-block">
                </div>
            </div>
        </form>
    
</body>
<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"
>
</script>
<script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
>
</script>
<script 
    src='https://kit.fontawesome.com/a076d05399.js' 
    crossorigin='anonymous'>
</script>
<script 
    type="text/javascript" 
    src="/src/js/app.js"
>
</script>
</html>