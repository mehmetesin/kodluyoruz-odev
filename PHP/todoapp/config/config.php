<?php

const BASEDIR = 'D:\Yaver\www\todoapp';
const URL = 'http://localhost/todoapp/';
const DEV_MODE = true;

try {
    $db = new PDO('mysql:host=localhost;dbname=todoapp;charset=utf8mb4', 'root', 'asdf');
} catch (PDOException $e) {
    echo $e->getMessage();
}
