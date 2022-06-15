<?php

// Import PHPMailer classes into the global namespace 
require '../vendor/autoload.php';
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;



class MailModel
{

    public function confirmationEmail()
    {

        $mail = new PHPMailer;

        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'projectlotus2023@gmail.com';   // SMTP username 
        $mail->Password = 'mqepvldycmkxtctm';  // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 

        // Sender info 
        $mail->setFrom('projectlotus2023@gmail.com', 'Lotus');

        // Add a recipient 
        $emailAddress = Application::$app->session->get("user");
        $mail->addAddress($emailAddress);

        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 

        // Set email format to HTML 
        $mail->isHTML(true);

        // Mail subject 
        $mail->Subject = 'Bevestiging ingediende opdracht';

        // Mail body content 
        $bodyContent = '<h1>Bedankt voor het indienen van een opdracht bij LOTUS!</h1>';
        $bodyContent .= '<p>U ontvangt deze email ter bevestiging van uw indiening.</b></p>';
        $mail->Body    = $bodyContent;

        // Send email 
        $mail->send();
    }
}
