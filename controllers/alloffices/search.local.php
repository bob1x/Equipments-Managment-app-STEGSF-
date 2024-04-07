<?php
session_start();
if (!$_SESSION['role']) {
    header('location: /login');
}

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);




$locals = $db->query("select * from local")->get();
$equipments = $db->query("SELECT * FROM equipment")->get();
$users = $db->query("select * from users") -> get();

$offices = $db->query("
SELECT localusers.*, users.mat_user, users.name AS user_name, users.email, users.telnum, local.name AS office_name, local.id_local AS office_id, local.placement
FROM localusers
JOIN local ON localusers.id_local = local.id_local
JOIN users ON localusers.id_user = users.id_user
")->get();

$localusers = $db->query("SELECT * FROM localusers")->get();
$equipmentoffices = $db->query("
SELECT localequipment.*, equipment.name AS equipment_name, equipment.id_equipment AS equipment_id, equipment.Referance AS ref, equipment.image AS image ,equipment.id_subcategory AS subcategory ,local.name AS office_name, local.id_local AS office_id, local.placement
FROM localequipment
JOIN local ON localequipment.id_local = local.id_local
JOIN equipment ON localequipment.id_equipment = equipment.id_equipment
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

$mat_user = $_SESSION['mat_user'];

// Check if a search term is provided
// Check if a search term is provided
if (isset($_POST['search'])) {
    $search = htmlspecialchars($_POST['search']);

    // Perform a search for offices based on location or name
    $offices = $db->query("
        SELECT localusers.*, users.mat_user, users.name AS user_name, users.email, users.telnum, local.name AS office_name, local.id_local AS office_id, local.placement
        FROM localusers
        JOIN local ON localusers.id_local = local.id_local
        JOIN users ON localusers.id_user = users.id_user
        WHERE localusers.mat_user = :mat_user
        AND (local.placement LIKE :search OR local.name LIKE :search)
    ", [
        'mat_user' => $mat_user,
        'search' => "%$search%"
    ])->get();
} else {
    // If no search term, retrieve all offices for the user
    $offices = $db->query("
        SELECT localusers.*, users.mat_user, users.name AS user_name, users.email, users.telnum, local.name AS office_name, local.id_local AS office_id, local.placement
        FROM localusers
        JOIN local ON localusers.id_local = local.id_local
        JOIN users ON localusers.id_user = users.id_user
        WHERE localusers.mat_user = :mat_user
    ", [
        'mat_user' => $mat_user,
    ])->get();
}

view("alloffice.views.php", [
    'heading' => 'Mes offices',
    'offices' => $offices,
    'equipments' => $equipments,
    'equipmentoffices' => $equipmentoffices,
    'logs' => $logs

]);