<?php
session_start();

$config = json_decode(file_get_contents('./Helper/config.json'));

try {
    $db = new PDO('mysql:host=' . $config->db->server . ';dbname=' . $config->db->name . ';charset=utf8mb4', $config->db->username, $config->db->password);
} catch (\Throwable $e) {
    echo $e->getMessage();
}
