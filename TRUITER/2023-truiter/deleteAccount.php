<?php
require 'bootstrap.php';

use App\Services\PhotoRepository;
use App\Services\TweetRepository;
use App\Services\UserRepository;
use App\Registry;

if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user']->getId();
$username = $_SESSION['user']->getUsername();
$userRepository = Registry::get(UserRepository::class);
$tweetRepository = Registry::get(TweetRepository::class);
$photoRepository = Registry::get(PhotoRepository::class);

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", 'root');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //$stmt = $pdo->prepare("DELETE FROM `tweet` WHERE user_id LIKE :id");
    //$stmt->bindValue(":id", $userId);
    //$stmt->execute();
    $tweetsId = $tweetRepository->retrieveId($userId);
    foreach ($tweetsId as $id)
        $photoRepository->delete($id['id']);

    $tweetRepository->deleteAll($userId);
    $userRepository->delete($username);
}
session_unset();
session_destroy();
header("Location: index.php");
exit();