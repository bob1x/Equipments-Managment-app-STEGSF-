<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!$_SESSION['role']){
    header('location: /login');
}
use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);
$db->query('delete from category where id_category = :id_category', ['id_category' => $_POST['id_category']]);
header('location: /categorycontrol');
exit();


