<?php
session_start();
if(!$_SESSION['role']){
    header('location: /login');
}


use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$equipment = $db->query('select * from equipment where Referance = :Referance', ['Referance' => "{$_GET['Referance']}"]) -> get();  

if(isset($_POST['search'])){
    $search = htmlspecialchars($_POST['search']);
    
    if($search != ''){
        $equipment = $db->query("SELECT * FROM equipment WHERE Referance LIKE :search OR name LIKE :search", ['search' => "%{$search}%"]) -> get();
    } else {
        // $equipment = $db->query('SELECT * FROM equipment WHERE Referance = :Referance', ['Referance' => "{$_GET['Referance']}"]) -> get();
        header('location: /equipmentcontrol');
        die();
    }
 
}

view("admin/equipmentcontrol.views.php", [
    'heading' => "{$_GET["name"]}",
    'equipments' => $equipment
   
]);

 