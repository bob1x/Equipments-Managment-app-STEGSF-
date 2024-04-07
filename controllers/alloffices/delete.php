<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!$_SESSION['role']){
    header('location: /login');
}

use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

$id_equipment = $_POST['id_equipment'];
$id_local = $_POST['id_local'];

// Fetch the unique_id of the equipment before deleting
$unique_id = $db->query('SELECT unique_id FROM localequipment WHERE id_equipment = :id_equipment AND id_local = :id_local', [
    'id_equipment' => $id_equipment,
    'id_local' => $id_local
])->fetchColumn();

// Delete the equipment from the localequipment table
$db->query('DELETE FROM localequipment WHERE unique_id = :unique_id', [
    'unique_id' => $unique_id
]);

$equipment_name = $db->query('SELECT name FROM equipment WHERE id_equipment = :id_equipment', [
    'id_equipment' => $id_equipment
])->fetchColumn();

$ref_equipment = $db->query('SELECT Referance FROM equipment WHERE id_equipment = :id_equipment', [
    'id_equipment' => $id_equipment
])->fetchColumn();

$local_name = $db->query('SELECT name FROM local WHERE id_local = :id_local', [
    'id_local' => $id_local
])->fetchColumn();

$placement = $db->query('SELECT placement FROM local WHERE id_local = :id_local', [
    'id_local' => $id_local
])->fetchColumn();

$status = $db->query('SELECT status FROM localequipment WHERE id_equipment = :id_equipment', [
    'id_equipment' => $id_equipment
])->fetchColumn(); 

$date_update = date('Y-m-d H:i:s');
$role_user = $_SESSION['role'];
$typelog = 'Retirer';
$user_name = $_SESSION['name'];
$mat_user = $_SESSION['mat_user'];

// Insert a log entry for the equipment deletion
$db->query('INSERT INTO logsequipment(id_local,date_update, role_user, mat_user, user_name, ref_equipment, equipment_name, status, typelog, local_name, placement) VALUES(:id_local, :date_update, :role_user, :mat_user, :user_name, :ref_equipment, :equipment_name, :status, :typelog, :local_name, :placement)', [
    'id_local' => $id_local,
    'date_update' => $date_update,
    'role_user' => $role_user,
    'mat_user' => $mat_user,
    'user_name' => $user_name,
    'ref_equipment' => $ref_equipment,
    'equipment_name' => $equipment_name,
    'status' => $status,
    'typelog' => $typelog,
    'local_name' => $local_name,    
    'placement' => $placement,
]);



header('location: /offices');
exit();


