<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if ($_SESSION['role'] == 'user') {
    header('location: /');
}

if (!$_SESSION['role']) {
    header('location: /login');
}

use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

// Get the ID of the local to be deleted
$localIdToDelete = $_POST['id_local'];

// Delete the local
$db->query('DELETE FROM local WHERE id_local = :id_local', ['id_local' => $localIdToDelete]);


header('location: /localcontrol');
exit();
