<?php

// Import PHPMailer classes into the global namespace 
require '../vendor/autoload.php';
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;



class MailModel
{

    private $mail;
    private $db;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();                      // Set mailer to use SMTP 
        $this->mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $this->mail->SMTPAuth = true;               // Enable SMTP authentication 
        $this->mail->Username = 'projectlotus2023@gmail.com';   // SMTP username 
        $this->mail->Password = 'mqepvldycmkxtctm';  // SMTP password 
        $this->mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $this->mail->Port = 587;                    // TCP port to connect to 
      

        // Sender info 
        $this->mail->setFrom('projectlotus2023@gmail.com', 'LOTUS Here We Go');

        $this->db = new Database;
    }


    public function addRequestEmail($description, $date, $pCity, $pStreet, $pHouse)
    {

        // Add a recipient 
        $emailAddress = Application::$app->session->get("user");
        $this->mail->addAddress($emailAddress);

        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 

        // Set email format to HTML 
        $this->mail->isHTML(true);

        // Mail subject 
        $this->mail->Subject = 'Bevestiging ingediende opdracht';

        // Set up for location format
        $playGround = $pStreet . ' ' . $pHouse . ', ' . $pCity;

        // Mail body content 
        $bodyContent = '<h1>Bedankt voor het indienen van een opdracht bij LOTUS!</h1>';
        $bodyContent .= '<p>U ontvangt deze email ter bevestiging van uw indiening. Hieronder vind u een overzicht met de details van uw opdracht.</b></b></p>';
        $bodyContent .= '<h3>' . $description . ' </h3>';
        $bodyContent .= '<p>Datum: ' . $date . ' </p>';
        $bodyContent .= '<p>Locatie: ' . $playGround . ' </p>';

        $this->mail->Body    = $bodyContent;

        // Send email 
        $this->mail->send();
    }

    public function requestReviewEmail($type, $results)
    {

        
        $emailAddress = $results['clientEmail'];
        

        // Add a recipient 
        $this->mail->addAddress($emailAddress);

        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 

        // Set email format to HTML 
        $this->mail->isHTML(true);

        $title = null;
        if ($type === 0) {
            $title = "Uw opdracht is helaas afgewezen!";
            $subtitle = "De coordinator heeft uw opdracht afgekeurd. Bij eventuele vragen over waarom uw opdracht afgewezen is, kunt u contact opnemen met de coordinator.";
        } else {
            $title = "Uw opdracht is geaccepteerd!";
            $subtitle = "De coordinator heeft uw opdracht goedgekeurd. Leden van LOTUS kunnen zich vanaf nu aanmelden voor uw opdracht. U zal op de hoogte worden gehouden van eventuele verdere ontwikkelingen rondom uw opdracht.";
        }

        // Mail subject 
        $this->mail->Subject = 'Uw ingediende opdracht is beoordeeld';

        // Set up for location format

        // Mail body content 
        $bodyContent = '<h1> ' . $title . '</h1>';
        $bodyContent .= '<p> '. $subtitle . '</p>';

        $this->mail->Body    = $bodyContent;

        // Send email 
        $this->mail->send();
    }

    public function participateAssignment($results)
    {

        foreach ($results as $item) {
            $description = $item['description'];
        }

        // Add a recipient 
        $emailAddress = Application::$app->session->get("user");
        $this->mail->addAddress($emailAddress); 

        // Set email format to HTML 
        $this->mail->isHTML(true);

        // Mail subject 
        $this->mail->Subject = 'U heeft zich ingeschreven voor een opdracht';


        // Mail body content 
        $bodyContent = '<h1>Bedankt voor het inschrijven voor de opdracht: ' . $description . '</h1>';
        $bodyContent .= '<p>De coordinator zal nu bepalen of u uitgekozen word om deze opdracht uit te voeren. Hieronder vind u nog enige details over uw inschrijving.</p>';

        $this->mail->Body    = $bodyContent;

        // Send email 
        $this->mail->send();
    }

    public function memberAssignedToRequest($email, $description)
    {

             // Add a recipient 
            $this->mail->addAddress($email); 

            // Set email format to HTML 
            $this->mail->isHTML(true);

            // Mail subject 
            $this->mail->Subject = 'U bent geselecteerd voor een opdracht';


            // Mail body content 
            $bodyContent = '<h1>De coordinator heeft u uitgekozen voor het uitvoeren van de opdracht: ' . $description . '</h1>';
            $bodyContent .= '<p>Hieronder vind u nog enige details over de opdracht.</p>';

            $this->mail->Body    = $bodyContent;

            // Send email 
            $this->mail->send();

            // Clear addres to not get unwanted CC
            $this->mail->ClearAddresses();   

    }

    public function clientRequestAssigned($results)
    {

        $emailAddress = $results['clientEmail'];
        $description = $results['description'];
        
        // Add a recipient 
        $this->mail->addAddress($emailAddress); 

        // Set email format to HTML 
        $this->mail->isHTML(true);

        // Mail subject 
        $this->mail->Subject = 'Uw opdracht is verdeeld onder de leden';


        // Mail body content 
        $bodyContent = '<h1>De coordinator heeft uw opdracht: ' . $description . ' verdeeld.</h1>';
        $bodyContent .= '<p>Hieronder vind u nog enige details over de opdracht.</p>';

        $this->mail->Body    = $bodyContent;

        // Send email 
        $this->mail->send();

        // Clear addres to not get unwanted CC
        $this->mail->ClearAddresses(); 
        
        

    }
}
