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
$db->query('delete from equipment where Referance = :Referance', ['Referance' => $_POST['Referance']]);
header('location: /equipmentcontrol');
exit();


