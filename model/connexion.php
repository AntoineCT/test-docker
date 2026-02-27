<?php

function connexion() {
    $dns = "mysql:host=localhost;dbname=user;charset=utf8";
    $pdo = new PDO($dns, "root", "", []);
    return $pdo;
}