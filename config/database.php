<?php
$host = 'localhost';
$dbname = 'proyecto';
$username = 'proyecto';
$password = '1403';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die($e->getMessage());
}
