<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if($_SESSION['role']=='user'){
    header('location: /');
}

if(!$_SESSION['role']){
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




$db->query('INSERT INTO subcategory(name,id_category,image) VALUES(:name,:id_category,:image)', [
    'name' => $_POST['name'],
    'id_category' => $_POST['id_category'],
    'image' => $image
    
]);

header('location:/subcategorycontrol');
die();
