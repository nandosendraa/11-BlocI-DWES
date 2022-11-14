<?php
session_start();
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root");
//$usuaris = ['usuario' => 'nando', 'password' => '1234a'];
$errors = [];
$isPost = false;
$usuario = "";
$password = "";
$_SESSION['user'] = '';
unset($_SESSION['errors']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $usuario = $_POST["username"];
    $password = $_POST["password"];
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username LIKE :username");
    $stmt->bindValue(":username",$usuario);
    $stmt->execute();
    $usuaris = $stmt->fetch();

    if (empty($usuario))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if ($usuaris != false) {
        if ($usuaris['username']!=$usuario) {
            $errors[] = "L'usuari no es correcte";
        }
        if ($usuaris['password']!=$password) {
            $errors[] = "La contrasenya no es correcta";
        }
    }else
        $errors[] = "Les dades no coincideixen";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: login.php');
}

if (empty($errors)) {
    unset($_SESSION['errors']);
    $_SESSION['user'] = $usuario;
    header('Location: index.php');
}