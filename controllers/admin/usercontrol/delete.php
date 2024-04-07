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

use Core\Database;



$config = require base_path('config.php');
$db = new Database($config['database']);
$db->query('delete from users where id_user = :id_user', ['id_user' => $_POST['id_user']]);
header('location: /usercontrol');
exit();


