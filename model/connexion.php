<?php

function connexionBDD() {
    $dns = "mysql:host=127.0.0.1;dbname=shop;charset=UTF8";
    $pdo = new PDO($dns, "admin", "admin", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    return $pdo;
}