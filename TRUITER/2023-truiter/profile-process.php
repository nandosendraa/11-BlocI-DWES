<?php
require ('bootstrap.php');
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
use App\Services\UserRepository;
use App\Helpers\Validator;
use App\Registry;

$user = $_SESSION["user"] ?? null;

if (empty($user))


$errors = [];
$isPost = false;
$username = "";
$id = $_SESSION['user']->getId();
$name= "";
$userRepository = Registry::get(UserRepository::class);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isPost = true;
    $name = $_POST["name"];
    $username = $_POST["username"];
    $usuariTrobat = $userRepository->findByUsername($username);
    try {
        Validator::lengthBetween($name,0,50,'El nom es masa gran');
        Validator::lengthBetween($username,0,15,"L'usuari es masa gran");
    }
    catch (InvalidArgumentException $e){
        $errors[] = $e->getMessage();
    }

    if ($usuariTrobat != false)
        $errors[] = "L'usuari ja existeix";

}

if (!empty($errors)) {
    FlashMessage::set('errors',$errors);
    header('Location: profile.php');
    exit();
}

if (empty($errors)) {
    if (!empty($username)) {
        $user->setUsername($username);
        $userRepository->update($user);
    }
    if (!empty($name)) {
        $user->setName($name);
        $userRepository->update($user);
    }
    header('Location: index.php');
    exit();
}
