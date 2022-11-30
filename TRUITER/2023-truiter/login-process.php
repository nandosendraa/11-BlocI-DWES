<?php
session_start();

use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
require ('bootstrap.php');

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$errors = [];
$isPost = false;
$usuario = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $usuario = $_POST["username"];
    $password = $_POST["password"];
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username LIKE :username");
    $stmt->bindValue(":username",$usuario);
    $stmt->execute();
    $usuaris = $stmt->fetch();

    if($usuaris) {
        $nom = $usuaris['name'];
        $id = $usuaris['id'];
    }

    if (empty($usuario))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if ($usuaris) {
        if ($usuaris['username']!=$usuario) {
            $errors[] = "L'usuari no es correcte";
        }
        if (!password_verify($password,$usuaris['password'])) {
            $errors[] = "La contrasenya no es correcta";
        }
    }else
        $errors[] = "Les dades no coincideixen";
}

if (!empty($errors)) {
    FlashMessage::set('errors',$errors);
    header('Location: login.php');
    exit();
}

if (empty($errors)) {
    $_SESSION['user'] = $usuaris;
    header('Location: index.php');
    exit();
}