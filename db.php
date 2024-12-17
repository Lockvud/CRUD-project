<?php

$host = 'localhost';
$db = 'db';
$user = 'root';
$pass = '';
$options = [PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass, $options);
} catch (PDOException $e) {
    echo 'Ошибка соединения с БД ' . $e->getMessage();
}