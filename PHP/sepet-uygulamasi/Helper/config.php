<?php
session_start();

class Settings
{
    const DB_SERVER = '127.0.0.1';
    const DB_USER = 'root';
    const DB_PASSWORD = 'asdf';
    const DB_NAME = 'patika';
}
try {
    $db = new PDO('mysql:host=' . Settings::DB_SERVER . ';dbname=' . Settings::DB_NAME . ';charset=utf8mb4', Settings::DB_USER, Settings::DB_PASSWORD);
} catch (\Throwable $e) {
    echo $e->getMessage();
}

if (isset($_SESSION['product']) && isset($_SESSION['summary']) && $_SESSION['summary']['count'] > 0) {
    $state = true;
    $summary = $_SESSION['summary'];
    $products = $_SESSION['product'];
} else {
    $state = false;
}
