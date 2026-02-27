<?php

include_once('./model/connexion.php');

function getAllUsers()
{
    $conn = connexionBDD();
    $stmt = $conn->query("SELECT * FROM user;");
    $users = $stmt->fetchAll();
    return $users;
}

function getUserById($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM user WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
    $users = $stmt->fetchAll();
    return $users[0];
}

function loginUser($pseudo, $mdp)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM user WHERE pseudo=:pseudo AND mdp=:mdp;");
    $stmt->execute([
        ':pseudo' => $pseudo,
        ':mdp' => $mdp
    ]);
    $users = $stmt->fetchAll();
    return count($users) > 0 ? $users[0] : false;
}

function addUser($pseudo, $mdp)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("INSERT INTO user (pseudo,mdp) VALUES(:pseudo,:mdp);");
    $stmt->execute([
        ':pseudo' => $pseudo,
        ':mdp' => $mdp
    ]);
    return true;
}

function updateUser($id, $pseudo, $mdp)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("UPDATE user SET pseudo=:pseudo, mdp=:mdp WHERE id=:id;");
    $stmt->execute([
        ':id' => $id,
        ':pseudo' => $pseudo,
        ':mdp' => $mdp
    ]);
}

function deleteUser($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("DELETE FROM user WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
}
