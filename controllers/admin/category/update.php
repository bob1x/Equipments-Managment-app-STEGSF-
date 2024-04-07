<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
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

if (empty($_POST['name'])) {
    $name = $_POST['old_name'];
} else {
    $name = $_POST['name'];
}
$config = require base_path('config.php');
$db = new Database($config['database']);



$db->query('UPDATE  category SET name=:name, image=:image WHERE category.id_category=:id_category', [
    'name' => $name,
    'image' => $image,
    'id_category' => $_POST['id_category']

]);

header('location: /categorycontrol');
die();