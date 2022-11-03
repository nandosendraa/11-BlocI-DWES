<?php
session_start();
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;

$usuaris = ['usuario' => 'nando', 'password' => '1234a'];
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

    if (empty($usuario))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if ($usuario !== $usuaris['usuario']) {
        $errors[] = "L'usuari no es correcte";
    }

    if ($password !== $usuaris['password']) {
        $errors[] = "La contrasenya no es correcta";
    }

}

if (!empty($errors)){
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
//    echo '<ul>';
//    foreach ($errors as $error){
//        echo '<li>'.$error.'</li>';
//    }
//    echo '</ul>';
}

if (empty($errors)) {
    unset($_SESSION['errors']);
    $_SESSION['user'] = $usuario;
    header('Location: index.php');
}