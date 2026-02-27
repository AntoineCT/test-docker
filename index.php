<?php

session_start();

include("./model/shop.model.php");
include("./model/user.model.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $page == 'addproduct') {
    $image = '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    
    // Handle image upload
    if ($_FILES['image']['name'] != '') {
        $target_dir = "./assets/images/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    
    if (!empty($name) && !empty($description) && !empty($price)) {
        if (addProduct($image, $name, $description, $price)) {
            header('Location: ?page=home');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $page == 'updateproduct') {
    $id = $_POST['product_id'] ?? '';
    $image = '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    
    if ($_FILES['image']['name'] != '') {
        $target_dir = "./assets/images/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $image = $target_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    
    if (!empty($id) && !empty($name) && !empty($description) && !empty($price)) {
        if (updateProduct($id, $image, $name, $description, $price)) {
            header('Location: ?page=home');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $page == 'deleteproduct') {
    $id = $_POST['product_id'] ?? '';
    if (!empty($id)) {
        if (deleteProduct($id)) {
            header('Location: ?page=home');
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $page == 'signin') {
    $pseudo = $_POST['pseudo'] ?? '';
    $mdp = $_POST['mdp'] ?? '';

    if(!empty($pseudo) && !empty($mdp)) {
        if(addUser($pseudo, $mdp)) {
            header('Location: ?page=login');
            exit();
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && $page == 'login') {
    $pseudo = $_POST['pseudo'] ?? '';
    $mdp = $_POST['mdp'] ?? '';

    if(!empty($pseudo) && !empty($mdp)) {
        $user = loginUser($pseudo, $mdp);
        if($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_pseudo'] = $user['pseudo'];
            header('Location: ?page=home');
            exit();
        } else {
            $error = "Identifiants incorrects";
        }
    }
}

if ($page == 'logout') {
    session_destroy();
    header('Location: ?page=home');
    exit();
}

$products = getAllProducts();

if ($page == 'addproduct') {
    include("./template/addproduct.phtml");
} else if ($page == 'updateproduct') {
    include("./template/updateproduct.phtml");
} else if ($page == 'deleteproduct') {
    include("./template/deleteproduct.phtml");
} else if ($page == 'signin') {
    include("./template/signin.phtml");
} else if ($page == 'login') {
    include("./template/login.phtml");
} else if ($page == 'logout') {
    include("./template/logout.phtml");
} else {
    include("./template/index.phtml");
}
