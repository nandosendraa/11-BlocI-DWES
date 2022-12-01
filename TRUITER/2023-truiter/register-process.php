<?php
require ('bootstrap.php');
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
use App\Services\UserRepository;
use App\Registry;
use App\Helpers\Validator;


$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$userRepository = Registry::get(UserRepository::class);
$errors = [];
$isPost = false;
$usuario = "";
$nom = "";
$verified = 0;
$password = "";
$passwordRepeat = "";
$date = Date("Y-m-d h:i:s");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $usuario = $_POST["username"];
    $nom = $_POST["nom"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    $passwordHash = password_hash($password,PASSWORD_DEFAULT);

    $usuariTrobat = $userRepository->findByUsername($usuario);

    try {
        Validator::lengthBetween($nom,2,50,'El nom ha de tindre entre entre 2 i 50 caracters');
        Validator::lengthBetween($usuario,2,15,"L'usuari ha de tindre entre 2 i 15 caracters");
        Validator::lengthBetween($password,8,16,'La contrasenya ha de tindre entre 8 i 16 caracters');
    }
    catch (InvalidArgumentException $e){
        $errors[] = $e->getMessage();
    }

    if ($passwordRepeat != $password)
        $errors[] = "Les contrasenyes no coincideixen";

    if ($usuariTrobat != false)
        $errors[] = "L'usuari ja existeix";
}

if (!empty($errors)) {
    FlashMessage::set('errors',$errors);
    header('Location: register.php');
    exit();
}

if (empty($errors)) {
    $newUser = new User($nom,$usuario);
    $newUser->setPassword($passwordHash);
    $newUser->setCreatedAt(new DateTime());
    $newUser->setVerified(false);
    $userRepository->addUser($newUser);
    $_SESSION['user'] = $usuariTrobat;
    header('Location: index.php');
    exit();
}