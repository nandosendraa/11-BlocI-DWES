<?php
require 'bootstrap.php';

use App\Services\UserRepository;
use App\Registry;

if (empty($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user']['id'];
$username = $_SESSION['user']['username'];
$userRepository = Registry::get(UserRepository::class);

$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", 'root');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->prepare("DELETE FROM `tweet` WHERE user_id LIKE :id");
    $stmt->bindValue(":id", $_SESSION['user']['id']);
    $stmt->execute();

    $userRepository->delete($username);
}
session_unset();
session_destroy();
header("Location: index.php");
exit();