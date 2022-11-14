<?php
session_start();
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", "root");
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
    var_dump($stmt->fetch());
    $usuaris = $stmt->fetch();


    if (empty($usuario))
        $errors[] = "Has de introduir l'usuari";

    if (empty($password))
        $errors[] = "Has de introduir la contrasenya";

    if (!empty($usuario)) {
        if ($stmt->fetch() == false) {
            $errors[] = "L'usuari no es correcte";
        }
        if ($password !== $usuaris['password']) {
            $errors[] = "La contrasenya no es correcta";
        }
    }
    if (!empty($usuario)) {

    }

}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header('Location: login.php');
}

if (empty($errors)) {
    unset($_SESSION['errors']);
    $_SESSION['user'] = $usuario;
    //header('Location: index.php');
}