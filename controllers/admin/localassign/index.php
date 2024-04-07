<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Ensure the user is an admin, adjust this condition based on your user roles
if ($_SESSION['role'] !== 'admin') {
    header('location: /'); // Redirect to home or login page
}

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$offices = [];
$users = [];
 



try {
    $offices = $db->query("select * from local") -> get();
    $users = $db->query("select * from users") -> get();
    $locals = $db->query("
    SELECT localusers.*,users.mat_user, users.name AS user_name, users.email, users.telnum, local.name AS office_name , local.id_local AS office_id , local.placement
    FROM localusers
    JOIN local ON localusers.id_local = local.id_local
    JOIN users ON localusers.id_user = users.id_user
    ")->get();    
    if (isset($_POST['local']) && $_POST['local'] !== 'all') {
        $logs = $db->query("
            SELECT logslocals.*, users.name AS user_name, local.name AS office_name
            FROM logslocals
            JOIN localusers ON logslocals.refop = localusers.Refop
            JOIN users ON localusers.id_user = users.id_user
            JOIN local ON localusers.id_local = local.id_local
            WHERE local.id_local = :id_local
        ", [
            'id_local' => $_POST['id_local'],
        ])->get();
    } else {
        $logs = $db->query("
            SELECT logslocals.*, users.name AS user_name, local.name AS office_name
            FROM logslocals
            JOIN localusers ON logslocals.refop = localusers.Refop
            JOIN users ON localusers.id_user = users.id_user
            JOIN local ON localusers.id_local = local.id_local
        ")->get();
    }
    
    view("admin/localassigningviews/offices.views.php", [
        'heading' => 'Office Assigning',
        'locals' => $locals,
        'users' => $users,
        'offices' => $offices,
        'logs' => $logs

    ]);
} catch (PDOException $e) {
    // Handle the database error (e.g., log the error, redirect to an error page).
    echo "Database Error: " . $e->getMessage();
}
