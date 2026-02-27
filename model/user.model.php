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
    $stmt = $conn->prepare("SELECT * FROM user WHERE pseudo=:pseudo;");
    $stmt->execute([
        ':pseudo' => $pseudo
    ]);
    $users = $stmt->fetchAll();
    
    if (count($users) > 0 && password_verify($mdp, $users[0]['mdp'])) {
        return $users[0];
    }
    return false;
}

function addUser($pseudo, $mdp)
{
    $conn = connexionBDD();
    $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO user (pseudo,mdp) VALUES(:pseudo,:mdp);");
    $stmt->execute([
        ':pseudo' => $pseudo,
        ':mdp' => $mdp_hashed
    ]);
    return true;
}

function updateUser($id, $pseudo, $mdp)
{
    $conn = connexionBDD();
    $mdp_hashed = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE user SET pseudo=:pseudo, mdp=:mdp WHERE id=:id;");
    $stmt->execute([
        ':id' => $id,
        ':pseudo' => $pseudo,
        ':mdp' => $mdp_hashed
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
