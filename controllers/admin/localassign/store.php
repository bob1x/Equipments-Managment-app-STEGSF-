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

$mat_user = $_POST['mat_user']; 
$id_local = $_POST['id_local'];

// Fetch the user ID based on mat_user
$id_user = $db->query('SELECT id_user FROM users WHERE mat_user = :mat_user', [
    'mat_user' => $mat_user
])->fetchColumn();

$errors = [];

if (!isset($_POST['id_local']) || !isset($_POST['mat_user'])) {
    $_SESSION['error_message'] = 'Both local and user must be selected.';
    header('location: /localassigne'); 
    die();
}
// Check if a local with the same name, placement, and location already exists
$existingLocal = $db->query('SELECT * FROM localusers WHERE id_local = :id_local AND id_user = :id_user', [
    'id_local' => $id_local,
    'id_user' => $id_user
])->find();

$existingAssignment = $db->query('SELECT * FROM localusers WHERE id_local = :id_local', [
    'id_local' => $id_local
])->find();

if ($existingAssignment) {
    $_SESSION['error_message'] = 'This local is already assigned!';
    header('location: /localassigne');
    die();

} elseif ($existingLocal) {
    $_SESSION['error_message'] = 'This local is not available!';
    header('location: /localassigne');
    die();
} else {
    $date_update = date('Y-m-d H:i:s');
    $role_user = $_SESSION['role'];
    $typelog = 'Assign';

    $db->query('INSERT INTO localusers(id_local, id_user, mat_user) VALUES(:id_local, :id_user, :mat_user)', [
        'id_local' => $id_local,
        'id_user' => $id_user,
        'mat_user' => $_POST['mat_user']
    ]);
    $refop = $db->lastInsertId();

    $local_name = $db->query('SELECT name FROM local WHERE id_local = :id_local', [
        'id_local' => $id_local
    ])->fetchColumn();
        



    $db->query('INSERT INTO logslocals(date_update, role_user, mat_user, local_name, typelog,refop) VALUES(:date_update, :role_user, :mat_user, :local_name, :typelog, :refop)', [
        'date_update' => $date_update,
        'role_user' => $role_user,
        'mat_user' => $mat_user,
        'local_name' => $local_name,    
        'typelog' => $typelog,
        'refop'=> $refop
    
    ]);

    header('location: /localassign');
    die();
}
