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

$logs = $db->query("select * from logsequipment ") -> get();

view("admin/dashboard.views.php", [
    'heading' => 'Logs',
    'logs' => $logs
]);