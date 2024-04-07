<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if($_SESSION['role']=='user'){
    header('location: /');
}

if(!$_SESSION['role']){
    header('location: /login');
}
$mat_user = $_POST['mat_user']; 
$id_local = $_POST['id_local'];

use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);



$db->query('delete from localusers where id_local = :id_local', ['id_local' => $_POST['id_local']]);

$local_name = $db->query('SELECT name FROM local WHERE id_local = :id_local', [
    'id_local' => $id_local
])->fetchColumn();

$date_update = date('Y-m-d H:i:s');
$role_user = $_SESSION['role'];
$typelog = 'Unassign';
$refop = 'NULL';

$db->query('INSERT INTO logslocals(date_update, role_user, mat_user, local_name, typelog,refop) VALUES(:date_update, :role_user, :mat_user, :local_name, :typelog, :refop)', [
    'date_update' => $date_update,
    'role_user' => $role_user,
    'mat_user' => $mat_user,
    'local_name' => $local_name,    
    'typelog' => $typelog,
    'refop'=> ''

]);


header('location: /localassign');
exit();


