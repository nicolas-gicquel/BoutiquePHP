<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=boutiquephp;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>