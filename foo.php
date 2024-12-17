<?php

include 'db.php';

$get_id = $_GET['id'] ?? null;

// Create

if (isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users (name, email) VALUES (?,?)";
        $query = $pdo->prepare($sql);
        $query->execute([$name, $email]);
        if ($query) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    } else {
        echo "Добавьте все данные!";
    }
} 

// Read

$sql = $pdo->prepare("SELECT id, name, email FROM users WHERE flag = 0");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_OBJ);


//  Update 

if (isset($_POST['edits'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE users SET name=?, email=? WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$name, $email, $get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

//  Delete

if (isset($_POST['delete'])) {
    $get_id = $_GET['id'];
    $sql = "UPDATE users SET flag = 1 WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute([$get_id]);
    if ($query) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
