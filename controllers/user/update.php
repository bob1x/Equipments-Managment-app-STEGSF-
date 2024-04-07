<?php
    // dd($_POST);
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if(!$_SESSION['role']){
    header('location: /login');
}



use Core\Database;


if (empty($_POST['name'])) {
    $name = $_POST['old_name'];
} else {
    $name = $_POST['name'];
}
if (empty($_POST['password'])) {
    $password = $_POST['old_password'];
} else {
    $password = $_POST['password'];
}
if (empty($_POST['email'])) {
    $email = $_POST['old_email'];
} else {
    $email = $_POST['email'];
}
if (empty($_POST['telnum'])) {
    $telnum = $_POST['old_telnum'];
} else {
    $telnum = $_POST['telnum'];
}
if (empty($_POST['Fonction'])) {
    $Fonction = $_POST['old_fonction'];
} else {
    $Fonction = $_POST['Fonction'];
}




$config = require base_path('config.php');
$db = new Database($config['database']);




$db->query('UPDATE users SET name=:name, password=:password,email=:email,telnum=:telnum,Fonction=:Fonction WHERE mat_user=:mat_user', [
    'name' => $name,
    'password'=>$password,
    'email'=>$email,
    'telnum'=>$telnum,
    'mat_user' => $_SESSION['mat_user'],
    'Fonction'=>$Fonction
]);


header('location: /profile');
die();


