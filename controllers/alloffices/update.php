<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!$_SESSION['role']){
    header('location: /login');
    exit();
}
use Core\Database;
use Core\Functions;

$config = require base_path('config.php');
$db = new Database($config['database']);

$id_local = $_POST['id_local'];


if (empty($_POST['status'])) {
    $status = $_POST['old_status'];
} else {
    $status = $_POST['status'];
}

$id_equipment = $_POST['id_equipment'];
$id_local = $_POST['id_local'];
$unique_id = $_POST['unique_id'];


// Update equipment status
$db->query('UPDATE localequipment SET status = :status WHERE unique_id = :unique_id', [
    'status' => $status,
    'unique_id' => $unique_id
]);


if ($_POST['status'] == 'casse') {
    try {   
        $mat_user = $_SESSION['mat_user'];
        $users = $db->query("SELECT name, email FROM users WHERE id_user = :id_user", ['id_user' => $mat_user])->get();
        $imagePath = $db->query("SELECT image FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $reference = $db->query("SELECT Referance FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $local = $db->query("SELECT local.name FROM local JOIN localequipment ON local.id_local = localequipment.id_local WHERE localequipment.id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $placement = $db->query("SELECT local.placement FROM local JOIN localequipment ON local.id_local = localequipment.id_local WHERE localequipment.id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $nom = $db->query("SELECT equipment.name FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $email = $_SESSION['email'];
        $body = '<b>Broken Equipment Notification </b> <br> ';
        $subject = 'This is to inform you that the equipment is broken.';
        
        
        // Call the sendEmail function
        sendEmail(
            $email, // sender email
            $subject, 
            $body, 
            $imagePath, // Image file path
            $reference, // Reference
            $nom, // Equipment name
            $local, // Office name
            $placement // Office placement

        );


        echo "<script>alert('Sent!')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
    }
        
    
}else if($_POST['status'] == 'Enpanne'){
    try {
        $mat_user = $_SESSION['mat_user'];
        $users = $db->query("SELECT name, email FROM users WHERE id_user = :id_user", ['id_user' => $mat_user])->get();
        $imagePath = $db->query("SELECT image FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $reference = $db->query("SELECT Referance FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $local = $db->query("SELECT local.name FROM local JOIN localequipment ON local.id_local = localequipment.id_local WHERE localequipment.id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $placement = $db->query("SELECT local.placement FROM local JOIN localequipment ON local.id_local = localequipment.id_local WHERE localequipment.id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $nom = $db->query("SELECT equipment.name FROM equipment WHERE id_equipment = :id_equipment", ['id_equipment' => $id_equipment])->fetchColumn();
        $email = $_SESSION['email'];
        $body = '<b>Not Working Equipment Notification </b> <br>';
        $subject = 'This is to inform you that the equipment is Not Working at the moment.';
        
        
        // Call the sendEmail function
        sendEmail(
            $email, // sender email
            $subject, 
            $body, 
            $imagePath, // Image file path
            $reference, // Reference
            $nom, // Equipment name
            $local, // Office name
            $placement // Office placement
        );


        echo "<script>alert('Sent!')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
    }
}else{

    header('location: /offices');
    exit();
    
}

header('location: /offices');
die();

