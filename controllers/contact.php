<?php 

session_start();
if(!$_SESSION['role']){
    header('location: /login');
}
view("contact.views.php" , [
    'heading' => 'Contact'
]);