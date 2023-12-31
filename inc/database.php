<?php
$pdo = new PDO('mysql:host=localhost;dbname=portfolioPhp', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
// var_dump($pdo);
