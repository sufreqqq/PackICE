<?php
session_start();
include 'logs.php';
$_SESSION['authorized'] = 0;
$connection = new PDO("mysql:host=localhost;dbname=nazarov;charset=utf8;", "root", "");
logs($connection, 'Выход пользователя');
header('Location: user.php');
?>