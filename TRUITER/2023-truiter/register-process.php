<?php
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
use App\Services\UserRepository;
use App\Registry;
use App\Helpers\Validator;
require ('bootstrap.php');

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
        if (empty($nom))
            $errors[] = "Has de introduir el nom";

        Validator::lengthBetween($nom,2,50,'El nom es masa gran');
        catch (InvalidArgumentException $e){
            $errors[] = $e->getMessage();
        }


        if (empty($usuario))
            $errors[] = "Has de introduir l'usuari";

        if (strlen($usuario) > 15)
            $errors[] = "L'usuari es masa gran";

        if (strlen($password) < 8 || strlen($password) > 16)
            $errors[] = "La contrasenya ha de tindre entre 8 i 16 caracters";

        if (empty($password))
            $errors[] = "Has de introduir la contrasenya";

        if ($passwordRepeat != $password)
            $errors[] = "Les contrasenyes no coincideixen";

        if ($usuariTrobat != false)
            $errors[] = "L'usuari ja existeix";
    }
}

if (!empty($errors)) {
    FlashMessage::set('errors',$errors);
    header('Location: register.php');
}

if (empty($errors)) {
    try {
        $stmt = $pdo->prepare("INSERT INTO user (name, username, password, created_at, verified) VALUES (:name, :username, :password, :created_at, :verified)");
        $stmt->bindParam(':name', $nom);
        $stmt->bindParam(':username', $usuario);
        $stmt->bindParam(':password', $passwordHash);
        $stmt->bindParam(':created_at', $date);
        $stmt->bindParam(':verified',$verified);
        $stmt->execute();
    }
    catch (PDOException $e){
        $e->getMessage();
    }
    $_SESSION['user'] = $usuaris;
    header('Location: index.php');
}