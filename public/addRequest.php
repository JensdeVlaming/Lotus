<!DOCTYPE html>
<html 
    lang="en"
>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "lotus";
$conn = mysqli_connect(
    $servername, 
    $username, 
    $password, 
    $db
);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<head>
    <meta 
        charset="UTF-8"
    >
    <meta 
        http-equiv="X-UA-Compatible" 
        content="IE=edge"
    >
    <meta 
        name="viewport" 
        content="width=device-width"
    >
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous"
    >
    <link 
        rel="stylesheet" 
        type="text/css" 
        href="src/css/styles.css"
    >
    <title>
        Lotus - Aanvraag plaatsen
    </title>
</head>

<?php
if (isset($_POST["placeRequest"])) {
    
    $requestName = $_POST["requestName"];
    $summary = $_POST["summary"];
    $comments = $_POST["comments"];
    $clientName = $_POST["clientName"];
    $billingAddress = $_POST["billingAddress"];
    $playDate = $_POST["playDate"];
    $playTime = $_POST["playTime"];
    $playGround = $_POST["playGround"];
    $lotusCasualties = $_POST["lotusCasualties"];

    $sql = 
        "INSERT INTO request (
            requestName, 
            summary, 
            comments, 
            clientName, 
            clientEmail, 
            billingAddress, 
            playDate, 
            playTime, 
            playGround, 
            lotusCasualties, 
            approved) 
        VALUES(
            '$requestName', 
            '$summary', 
            '$comments', 
            '$clientName', 
            -- TODO: change email value to users email!
            'user.email@lotus.com', 
            '$billingAddress', 
            '$playDate', 
            '$playTime', 
            '$playGround', 
            '$lotusCasualties', 
            -- TODO: change default in db!
            '0'
        )";

    if ($conn->query($sql)) {
        echo "request geplaatst";
    }
}
?>

<body>
    <form 
        action="" 
        method="post"
        class="
            d-flex 
            align-items-center 
            justify-content-center
            "
        >
        <div class="">
            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            Emailadres:
            </label>
            <input
                type="mail" 
                name="clientEmail" 
                id="clientEmail"
                value="user.email@lotus.com"
                required
                readonly
                class="form-control"
                disabled
            >
            </div>



            <div 
                class="row"
            >
            <label 
                for="requestName"
                class="mt-2"
            >
            <span class="requiredField">*</span>Bedrijfsnaam:  
            </label>
            <input 
                type="text" 
                name="requestName" 
                id="requestName"
                required
                class="form-control"
            >
            </div>
            


            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Korte Omschrijving: 
            </label>
            <textarea 
                name="summary" 
                id="summary"
                required
                class="form-control"
                
            ></textarea>
            </div>


            
            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Opmerkingen: 
            </label>
            <input 
                type="text" 
                name="comments" 
                id="comments"
                required
                class="form-control"
            >
            </div>
            


            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Naam: 
            </label>
            <input 
                type="text" 
                name="clientName" 
                id="clientName"
                required
                class="form-control"
            >
            </div>



            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Factuuradres: 
            </label>
            <input 
                type="text" 
                name="billingAddress" 
                id="billingAddress"
                required
                class="form-control"
            >
            </div>
            


            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Speel Plaats
            </label>
            <input 
                type="text" 
                name="playGround" 
                id="playGround"
                required
                class="form-control"
            >
            </div>



            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Speel Datum: 
            </label>
            <input 
                type="text" 
                name="playDate" 
                id="playDate"
                required
                class="form-control"
            >
            </div>



            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Speel Tijd: 
            </label>
            <input 
                type="text" 
                name="playTime" 
                id="playTime"
                required
                class="form-control"
            >
            </div>



            <div 
                class="row"
            >
            <label 
                for="clientEmail"
                class="mt-2"
            >
            <span class="requiredField">*</span>Aantal Slachtoffers: 
            </label>
            <input 
                type="text" 
                name="lotusCasualties" 
                id="lotusCasualties"
                required
                class="form-control"
            >
            </div>

            <div 
                class="row"
            >
            <input 
                type="submit" 
                value="plaats aanvraag"
                name="placeRequest"
                id="placeRequest"
                class="
                    submitRequestButton 
                    btn
                    mt-3
                    mb-3
                "
            >
            </div>
        </div>
    </form>
</body>
<script 
    type="text/javascript" 
    src="./src/js/app.js"
>
</script>
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
</html>