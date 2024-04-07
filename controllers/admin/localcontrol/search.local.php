<?php
session_start();

if(!$_SESSION['role']){
    header('location: /login');
}
if ($_SESSION['role'] == 'user') {
    header('location: /');
}


use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$locals = $db->query('select * from local where id_local = :id_local', ['id_local' => "{$_GET['id_local']}"]) -> get();  

if(isset($_POST['search'])){
    $search = htmlspecialchars($_POST['search']);
    
    if($search != ''){
        $locals = $db->query("SELECT * FROM local WHERE name LIKE :search OR placement LIKE :search", ['search' => "%{$search}%"]) -> get();
    } else {
        header('location: /localcontrol');
        die();
    }
 
}

view("admin/localcontrol.views.php", [
    'heading' => "{$_GET["name"]}",
    'locals' => $locals
   
]);

 