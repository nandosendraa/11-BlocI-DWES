<?php
session_start();

use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
require ('src/App/FlashMessage.php');

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root");
$errors = [];
$isPost = false;
$usuario = "";
$password = "";
FlashMessage::unset('users');
FlashMessage::unset('errors');
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
    header('Location: Login.php');
}

if (empty($errors)) {
    FlashMessage::unset('errors');
    FlashMessage::set('user',$usuario);
    FlashMessage::set('nom',$nom);
    FlashMessage::set('id',$id);
    header('Location: index.php');
}