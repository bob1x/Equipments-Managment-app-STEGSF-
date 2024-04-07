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

$mat_user = $_SESSION['mat_user'];

$currentUser = $db->query("SELECT * FROM users WHERE mat_user = :mat_user", ['mat_user' => $mat_user])->get();

$query = "SELECT localusers.*, local.name AS office_name, local.placement, local.image
          FROM localusers
          JOIN local ON localusers.id_local = local.id_local
          WHERE localusers.mat_user = :mat_user
          ";

$params = ['mat_user' => $mat_user];

$offices = $db->query($query, $params)->get();



view("user/profile.views.php", [
    'heading' => 'Profile',
    'currentUser' => $currentUser,
    'offices' => $offices

]);



