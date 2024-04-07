<?php
session_start();
if($_SESSION['role']=='user'){
    header('location: /');
}

if(!$_SESSION['role']){
    header('location: /login');
}


use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);


$users = $db->query("select * from users ") -> get();



$userOF = $db->query("
    SELECT localusers.*, local.name AS office_name, local.placement , users.name AS user_name
    FROM localusers
    JOIN local ON localusers.id_local = local.id_local
    JOIN users ON localusers.id_user = users.id_user
")->get();


view("admin/usercontrol.views.php", [
    'heading' => 'Users Control',
    'users' => $users,
    'userOF' => $userOF
]);