<?php


session_start();

if ($_SESSION['role'] == 'user') {
    header('location: /');
}

if (!$_SESSION['role']) {
    header('location: /login');
}

use Core\Database;

$mat_user = $_POST['mat_user'];
$telNum = $_POST['TelNum'];

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

// Check if the user with the same matricule already exists
$existingMatricule = $db->query('SELECT * FROM users WHERE mat_user = :mat_user', ['mat_user' => $mat_user])->find();

if ($existingMatricule) {
    $_SESSION['error_message'] = 'Matricule already exists';
    header('location: /usercontrol');
    die();
}

// Check if the user with the same TelNum already exists
$existingTelNum = $db->query('SELECT * FROM users WHERE TelNum = :telNum', ['telNum' => $telNum])->find();

if ($existingTelNum) {
    $_SESSION['error_message'] = 'Telephone Number already exists';
    header('location: /usercontrol');
    die();
}

// If no errors, proceed to insert the new user into the database
$db->query('INSERT INTO users(mat_user,email,name,role,password,TelNum,Fonction) VALUES(:mat_user,:email,:name,:role,:password,:TelNum,:Fonction)', [
    'mat_user' => $_POST['mat_user'],
    'email' => $_POST['email'],
    'password' => $_POST['password'], 
    'name' => $_POST['name'],
    'role' => $_POST['role'],
    'TelNum' => $telNum,
    'Fonction' => $_POST['Fonction']
]);

header('location: /usercontrol');
die();
