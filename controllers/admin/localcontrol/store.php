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
// Get reference to uploaded image
$image_file = $_FILES["fileToUpload"];

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

$name = $_POST['name'];
$placement = $_POST['placement'];

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

// Check if a local with the same name, placement, and location already exists
$existingLocal = $db->query('SELECT * FROM local WHERE name = :name AND placement = :placement ', [
    'name' => $name,
    'placement' => $placement
])->find();

if ($existingLocal) {
    $_SESSION['error_message'] = 'Local with the same name, placement, and location already exists';
    header('location: /localcontrol'); // Modify the path based on your routes
    die();
}
$image= "/images/" . $image_file["name"];

// If no errors, proceed to insert the new local into the database
$db->query('INSERT INTO local(name, placement,image) VALUES(:name, :placement,:image)', [
    'name' => $name,
    'placement' => $placement,
    'image' => $image
]);

header('location: /localcontrol'); // Modify the path based on your routes
die();

