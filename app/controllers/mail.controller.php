<?php
 
// Import PHPMailer classes into the global namespace 
require '../vendor/autoload.php';
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;



class MailController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function mail() {
 
        $mail = new PHPMailer;
 
        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'projectlotus2023@gmail.com';   // SMTP username 
        $mail->Password = 'mqepvldycmkxtctm';  // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 
         
        // Sender info 
        $mail->setFrom('lotus.herewego@gmail.com', 'Lotus');
         
        // Add a recipient 
        $mail->addAddress('dvzdanieldvz@gmail.com'); 
         
        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 
         
        // Set email format to HTML 
        $mail->isHTML(true); 
         
        // Mail subject 
        $mail->Subject = 'Email from Localhost by CodexWorld'; 
         
        // Mail body content 
        $bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>'; 
        $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>'; 
        $mail->Body    = $bodyContent; 
         
        // Send email 
        if(!$mail->send()) { 
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            echo 'Message has been sent.'; 
        } 
    }
}
