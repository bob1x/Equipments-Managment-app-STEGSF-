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


$equipments = $db->query("select * from equipment") -> get();
$subcategory = $db->query("select * from subcategory ") -> get();
if(isset($_POST['subcategory']) && $_POST['subcategory']!='all' ){
    $subcategory = $db->query("select * from equipment where id_subcategory =:id_subcategory ", [
        'id_subcategory' => $_POST['subcategory'],
    ]) -> get();
}


view("admin/equipmentcontrol.views.php", [
    'heading' => 'Equipments Control',
    'equipments' => $equipments,
    'subcategories' => $subcategory
]);



