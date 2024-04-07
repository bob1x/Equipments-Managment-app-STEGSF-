<?php

ob_start();
if (!isset($_SESSION))
    session_start();
unset($_SESSION);
session_destroy();
header("location: /login");

