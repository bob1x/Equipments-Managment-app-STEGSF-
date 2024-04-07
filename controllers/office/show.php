<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!$_SESSION['role']) {
    header('location: /login');
}

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$offices =[];

try {

$mat_user = $_SESSION['mat_user'];
$equipments = $db->query("SELECT * FROM equipment")->get();


$users = $db->query("select * from users") -> get();
$offices = $db->query("
    SELECT localusers.*, local.name AS office_name, local.placement , users.name AS user_name
    FROM localusers
    JOIN local ON localusers.id_local = local.id_local
    JOIN users ON localusers.id_user = users.id_user
    WHERE localusers.mat_user = $mat_user
    AND localusers.id_local = :id",['id'=>"{$_GET['id']}"
])->get();


$equipmentoffices = $db->query("
    SELECT localequipment.*, equipment.name AS equipment_name, equipment.id_equipment AS equipment_id, equipment.Referance AS ref, equipment.image AS image, subcategory.name AS subcategory, local.name AS office_name, local.id_local AS office_id, local.placement
    FROM localequipment
    JOIN local ON localequipment.id_local = local.id_local
    JOIN equipment ON localequipment.id_equipment = equipment.id_equipment
    JOIN subcategory ON equipment.id_subcategory = subcategory.id_subcategory
")->get();

$logs = [];
foreach ($offices as $office) {
    $officeLogs = $db->query("
    SELECT *
    FROM logsequipment 
    WHERE logsequipment.id_local = :id_local
", [
    'id_local' => $office['id_local'],
])->get();

    // Merge the logs for each office
    $logs = array_merge($logs, $officeLogs);
}


view("myoffice/office.views.php", [
    'heading' =>$office['office_name'],
    'offices' => $offices,
    'equipments' => $equipments,
    'equipmentoffices' => $equipmentoffices,
    'logs' => $logs

]);

} catch (PDOException $e) {
    // Handle the database error (e.g., log the error, redirect to an error page).
    echo "Database Error: " . $e->getMessage();
}
 
 