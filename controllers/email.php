<?php 

use Core\Databaseuse;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;;



    //Load Composer's autoloader
require base_path('vendor/autoload.php');
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'g4llll77@gmail.com';                     //SMTP username
        $mail->Password   = 'mmli xawj wsmh wqsb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('g4llll77@gmail.com', 'Mailer');
        $mail->addAddress($_POST['email'], $_POST['name']); 
            //Add a recipient
    
        //Attachments
        $mail->addAttachment($_POST['image'], 'img.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject =  'broken equipment' ;
        $mail->Body    =  ' this is equipment is broken ad  <br> <img src="cid:img.jpg">';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo "<scrip> alert('Sent !') </script>";
        view("myoffice.views.php");


    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    