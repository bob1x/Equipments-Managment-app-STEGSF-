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

$config = require base_path('config.php');
$db = new Database($config['database']);

$image= "/images/" . $image_file["name"];



$Referance = $_POST['Referance'];
$name = $_POST['name'];
$id_subcategory = $_POST['id_subcategory'];
$description = $_POST['description'];


$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

// Check if a local with the same name, placement, and location already exists
$existingLocal = $db->query('SELECT * FROM equipment WHERE Referance = :Referance AND name = :name AND id_subcategory=:id_subcategory ', [
    'Referance' => $Referance,
    'name' => $name,
    'id_subcategory' => $id_subcategory
])->find();

if ($existingLocal) {
    $_SESSION['error_message'] = 'Equipment with the same name, and Referance already exists';
    header('location: /equipmentcontrol'); // Modify the path based on your routes
    die();
}

// If no errors, proceed to insert the new local into the database
$db->query('INSERT INTO equipment(Referance, name, description,id_subcategory,image) VALUES(:Referance, :name, :description,:id_subcategory,:image)', [
    'Referance' => $Referance,
    'name' => $name,
    'description' => $description,
    'id_subcategory' => $id_subcategory,
    'image' => $image

]);

header('location: /equipmentcontrol'); // Modify the path based on your routes
die();

