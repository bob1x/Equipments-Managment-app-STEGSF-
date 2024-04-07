<?php
session_start();

view("auth/login.views.php", [
    'errors' => []
]);

