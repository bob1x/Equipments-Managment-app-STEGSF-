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

$locals = $db->query("select * from local ") -> get();

view("admin/localcontrol.views.php", [
    'heading' => 'local Control',
    'locals' => $locals
]);