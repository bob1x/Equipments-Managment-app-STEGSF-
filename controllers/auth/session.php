<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

$mat_user = $_POST['mat_user'];
$password = $_POST['password'];

$errors = [];

$user = $db->query('select * from users where mat_user = :mat_user',
[
    'mat_user' => $mat_user,
]
)->find();

if (!$user) {
    $errors['mat_user'] = 'invalid Identifier';
}
else if (!ctype_digit($mat_user)){
    $errors['mat_user'] = "MAT identifier should contain only numeric characters and be 5 Number's  long";
}

else if ($password !== $user['password']) {
    $errors['password'] = 'incorrect password';
}


 if (!empty($errors)) {
     return view("auth/login.views.php", [
        'errors' => $errors
    ]);
    
 }else{

    session_start();
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['mat_user'] = $user['mat_user'];
    $_SESSION['role'] = $user['role'];

    if ($_SESSION['role']== 'admin'){
        header('location: /dashboard');
    die();
    }else if ($_SESSION['role']== 'user'){
        header('location: /');
    die();

    }
    
 }
 
 