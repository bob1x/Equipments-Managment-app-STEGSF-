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
$db->query('delete from subcategory where id_subcategory = :id_subcategory', ['id_subcategory' => $_POST['id_subcategory']]);
header('location: /subcategorycontrol');
exit();


