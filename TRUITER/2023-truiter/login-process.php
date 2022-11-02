<?php
    require 'views/login.view.php';
session_start();
$usuaris = ['usuario' => 'nando', 'password' => '1234a'];
$errors = [];
$isPost = false;
$usuario = "";
$password = "";
$_SESSION['user'] = '';
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
    echo '<ul>';
    foreach ($errors as $error){
        echo '<li>'.$error.'</li>';
    }
    echo '</ul>';
}

if ($isPost || empty($errors)) {
    $_SESSION['user'] = $usuario;
    header('Location: index.php');
}