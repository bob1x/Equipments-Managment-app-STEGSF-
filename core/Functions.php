<?php 
use Core\Response;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";  
    die();

}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;

}

function abort($code = Response::NOT_FOUND){
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();

}


function Unauthorized($condition, $status= Response::FORBIDDEN) {
    if (!$condition){
        abort($status);
    }

}

function base_path($path)
{
    return BASE_PATH . $path; 
}

function view($path, $attributes = []){
    extract($attributes); 
    require  base_path('views/'.$path); 
}

function bind($value){
    return ":" . ltrim($value, ':');
}


function redirect($path){
    header("Location: {$path}");
    die();
}



function generate_unique_id() {
    
    $microtime = microtime(true) * 1000;
  $baseId = (int) $microtime;
  $baseId = random_int(1000, 9999);
  
  $randomInt = random_int(1000, 9999); // Generate random 4-digit integer

  $uniqueId = $baseId . $randomInt;

 

  return $uniqueId;
}   

function hasAccess($userAccess, $officeId){
    return in_array($officeId, $userAccess);
}

// function redirect($path, $params = []){
//     $query = http_build_query($params);
//     header("Location: {$path}?{$query}");
//     die();
// }

function sendEmail($sender, $subject, $body, $imagePath, $reference , $nom, $local, $placement ) {


//Load Composer's autoloader
require base_path('vendor/autoload.php');

$mail = new PHPMailer;

 
try {

    
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'g4llll77@gmail.com';                     //SMTP username
    $mail->Password   = 'lote tqqc xlfg glvw
';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom($sender, 'agent');                              //Add a recipient
    $mail->addAddress('g4llll77@gmail.com', 'Responsable');


    $mail->addAttachment($imagePath , 'image');   
                            // Add the image as an attachment


    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body . ' <b>Reference: </b>' . $reference . '<br>' . ' Equipment name: ' . $nom  .'<br>' . 'local et placement : ' . $local .'<br>' . $placement; 


    $mail->send();
    echo "<script>alert('Sent!')</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
// 