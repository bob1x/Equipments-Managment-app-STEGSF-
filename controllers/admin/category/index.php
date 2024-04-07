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

$category = $db->query("select * from category ") -> get();

view("admin/categorycontrol.views.php", [
    'heading' => 'categories',
    'categories' => $category
]);
