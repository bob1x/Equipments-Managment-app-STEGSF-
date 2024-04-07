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
$mat_user = $_SESSION['mat_user'];
$id_local = isset($_POST['id_local']) ? $_POST['id_local'] : null;
// dd($_POST);

try {
    $users = $db->query("select * from users WHERE id_user = $mat_user ")->get();
    $status = 'nouveau';

    // Generate a unique ID for the equipment
    $unique_id = generate_unique_id();

    $db->query('INSERT INTO localequipment (id_local, id_equipment, status, unique_id) VALUES (:id_local, :id_equipment, :status, :unique_id )', [
        'id_local' => $id_local,
        'id_equipment' => $_POST['id_equipment'],
        'status' => $status,
        'unique_id' => $unique_id
    ]);
   
    $local_name = $db->query('SELECT name FROM local WHERE id_local = :id_local', [
        'id_local' => $id_local
    ])->fetchColumn();
    $equipment_name = $db->query('SELECT name FROM equipment WHERE id_equipment = :id_equipment', [
        'id_equipment' => $_POST['id_equipment']
    ])->fetchColumn();
    $ref_equipment = $db->query('SELECT Referance FROM equipment WHERE id_equipment = :id_equipment', [
        'id_equipment' => $_POST['id_equipment']
    ])->fetchColumn();
    $placement = $db->query('SELECT placement FROM local WHERE id_local = :id_local', [
        'id_local' => $id_local
    ])->fetchColumn();

    $date_update = date('Y-m-d H:i:s');
    $role_user = $_SESSION['role'];
    $typelog = 'Ajouter';
    $user_name = $_SESSION['name'];
    

    $db->query('INSERT INTO logsequipment(id_local,date_update, role_user, mat_user,user_name,ref_equipment,equipment_name,status,typelog,local_name,placement) VALUES(:id_local,:date_update, :role_user, :mat_user,:user_name,:ref_equipment,:equipment_name,:status,:typelog,:local_name,:placement)', [
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
        'placement' => $placement
    ]);
    header('location: /offices');
    die();

} catch (PDOException $e) {
    // Handle the exception, log it, or display an error message
    dd($e->getMessage());
}
