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
        $this->mail->setFrom('projectlotus2023@gmail.com', 'Lotus');

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
        $emailAddress = null;
        foreach ($results as $item) {
            $emailAddress = $item['clientEmail'];
        }

        // Add a recipient 
        $this->mail->addAddress($emailAddress);

        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 

        // Set email format to HTML 
        $this->mail->isHTML(true);

        $title = null;
        if ($type === 0) {
            $title = "Uw opdracht is helaas afgewezen!";
        } else {
            $title = "Uw opdracht is geaccepteerd!";
        }

        // Mail subject 
        $this->mail->Subject = 'Uw opdracht is gereviewed';

        // Set up for location format

        // Mail body content 
        $bodyContent = '<h1> ' . $title . '</h1>';
        $bodyContent .= '<p>U ontvangt deze email ter bevestiging van uw indiening. Hieronder vind u een overzicht met de details van uw opdracht.</b></b></p>';
        $bodyContent .= '<h3></h3>';
        $bodyContent .= '<p>Datum:</p>';
        $bodyContent .= '<p>Locatie:</p>';

        $this->mail->Body    = $bodyContent;

        // Send email 
        $this->mail->send();
    }
}
