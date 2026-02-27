<?php

include_once('./model/connexion.php');

function getAllProducts()
{
    $conn = connexionBDD();
    $stmt = $conn->query("SELECT * FROM product;");
    $products = $stmt->fetchAll();
    return $products;
}

function getProductById($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("SELECT * FROM product WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
    $products = $stmt->fetchAll();
    return $products[0];
}

function addProduct($image, $name, $description, $price)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("INSERT INTO product (image,name,description,price) VALUES(:image,:name,:description,:price);");
    $stmt->execute([
        ':image' => $image,
        ':name' => $name,
        ':description' => $description,
        ':price' => $price
    ]);
    return true;
}

function updateProduct($id, $image, $name, $description, $price)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("UPDATE product SET image=:image, name=:name, description=:description, price=:price WHERE id=:id;");
    $stmt->execute([
        ':id' => $id,
        ':image' => $image,
        ':name' => $name,
        ':description' => $description,
        ':price' => $price
    ]);
}

function deleteProduct($id)
{
    $conn = connexionBDD();
    $stmt = $conn->prepare("DELETE FROM product WHERE id=:id;");
    $stmt->execute([
        ':id' => $id
    ]);
}
