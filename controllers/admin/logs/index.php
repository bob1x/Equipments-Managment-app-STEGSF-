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

$logs = $db->query("select * from logslocals ") -> get();

view("admin/offices.views.php", [
    'heading' => 'Logs',
    'logs' => $logs
]);
