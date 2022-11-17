<?php
session_start();
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", "root");
$errors = [];
$isPost = false;
$username = "";
$name= "";
unset($_SESSION['errors']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $name = $_POST["name"];
    $username = $_POST["username"];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username LIKE :username");
    $stmt->bindValue(":username",$username);
    $stmt->execute();
    $usuaris = $stmt->fetch();
    var_dump($usuaris);

    if ($usuaris != false)
        $errors[] = "L'usuari ja existeix";

    if (!empty($name)) {
        if (strlen($name) > 50)
            $errors[] = "El nom es masa gran";
    }

    if (!empty($username)) {
        if (strlen($username) > 50)
            $errors[] = "L'usuari es masa gran";
    }
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: profile.php');
}

if (empty($errors)) {
    unset($_SESSION['errors']);
    if (!empty($username)) {
        $stmt = $pdo->prepare("UPDATE user SET username = :username WHERE id = :id");
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":id",$_SESSION['id']);
        $stmt->execute();
        $_SESSION['user'] = $username;
    }
    if (!empty($name)) {
        $stmt = $pdo->prepare("UPDATE user SET name = :name WHERE id = :id");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":id",$_SESSION['id']);
        $stmt->execute();
        $_SESSION['nom'] = $name;
    }
   header('Location: index.php');
}