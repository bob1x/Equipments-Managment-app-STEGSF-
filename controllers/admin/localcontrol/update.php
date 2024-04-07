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

$image_file = $_FILES["fileToUpload-update"];

if ($image_file["tmp_name"]) {
    // Exit if no file uploaded
    if (!isset($image_file)) {
        die('No file uploaded.');
    }

    // Exit if is not a valid image file
    $image_info = getimagesize($image_file["tmp_name"]);
    if (!$image_info) {
        die('Uploaded file is not an image.');
    }

    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],
        // New image location
        base_path("/public/images/" . $image_file["name"])
    );
    $image = "/images/" . $image_file["name"];
} else {
    $image = $_POST['old_image'];
}

$name = !empty($_POST['name']) ? $_POST['name'] : $_POST['old_name'];
$placement = !empty($_POST['placement']) ? $_POST['placement'] : $_POST['old_placement'];

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

// Construct the SQL query dynamically based on the fields that are being updated
$updateFields = [];
$params = [
    'id_local' => $_POST['id_local']
];

if (!empty($name)) {
    $updateFields[] = 'name = :name';
    $params['name'] = $name;
}

if (!empty($placement)) {
    $updateFields[] = 'placement = :placement';
    $params['placement'] = $placement;
}

if (!empty($image)) {
    $updateFields[] = 'image = :image';
    $params['image'] = $image;
}

$updateQuery = 'UPDATE local SET ' . implode(', ', $updateFields) . ' WHERE local.id_local = :id_local';

// Execute the update query
$db->query($updateQuery, $params);

header('location: /localcontrol');
die();
