<?php

require ('bootstrap.php');
use App\Photo;
use App\Registry;
use App\Services\UserRepository;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;

$userRepository = Registry::get(UserRepository::class);

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$errors = [];
$isPost = false;
$usuario = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $usuario = $_POST["username"];
    $password = $_POST["password"];
    $usuariTrobat = $userRepository->findByUsername($usuario);

    if (empty($usuario))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if ($usuariTrobat) {
        if ($usuariTrobat->getUsername()!=$usuario) {
            $errors[] = "L'usuari no es correcte";
        }
        if (!password_verify($password,$usuariTrobat->getPassword())) {
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
    $_SESSION['user'] = $usuariTrobat;
    header('Location: index.php');
    exit();
}