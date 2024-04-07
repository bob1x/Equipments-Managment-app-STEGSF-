<?php
session_start();
if($_SESSION['role']=='user'){
    header('location: /');
}

if(!$_SESSION['role']){
    header('location: /login');
}


use Core\Database;


$config = require base_path('config.php');
$db = new Database($config['database']);

$subcategory = $db->query("select * from subcategory ") -> get();
$category = $db->query("select * from category ") -> get();
if(isset($_POST['category']) && $_POST['category']!='all' ){
    $subcategory = $db->query("select * from subcategory where id_category =:id_category ", [
        'id_category' => $_POST['category'],
        
    ]) -> get();
}
view("admin/subcategorycontrol.views.php", [
    'heading' => 'Sub categories',
    'subcategories' => $subcategory,
    'categories' => $category
]);