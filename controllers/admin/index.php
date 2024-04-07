<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!$_SESSION['role']) {
    header('location: /login');
}
if ($_SESSION['role'] == 'user') {
    header('location: /');
}

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

try {
    $users = $db->query("select * from users")->get();
    $locals = $db->query("select * from local")->get();
    $offices = $db->query("
        SELECT localusers.*, users.mat_user, users.name AS user_name, users.email, users.telnum, local.name AS office_name, local.id_local AS office_id, local.placement
        FROM localusers
        JOIN local ON localusers.id_local = local.id_local
        JOIN users ON localusers.id_user = users.id_user
    ")->get();
    $equipments = $db->query("
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


    view("admin/dashboard.views.php", [
        'heading' => 'Tous les Beureaux',
        'offices' => $offices,
        'logs' => $logs,
        'equipments' => $equipments
    ]);
} catch (PDOException $e) {
    // Handle the database error (e.g., log the error, redirect to an error page).
    echo "Database Error: " . $e->getMessage();
}
