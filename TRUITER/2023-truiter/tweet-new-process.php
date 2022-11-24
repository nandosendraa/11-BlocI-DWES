<?php
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
use App\FlashMessage;
session_start();
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$tweetText = '';
$user = $_SESSION['user']['username'];
try {
    $idStmt = $pdo->prepare("SELECT id FROM user WHERE username LIKE :user");
    $idStmt->bindParam(":user", $user);
    $idStmt->execute();
}
catch (PDOException $e){
    $e->getMessage();
}
$id = $idStmt->fetch()['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tweetText = $_POST['tweetText'];
    $date = Date("Y-m-d h:i:s");

    $stmt = $pdo->prepare("INSERT INTO tweet (text, created_at, like_count, user_id) VALUES (:text, :created_at, :like_count, :user_id)");
        $stmt->bindValue(":text",$tweetText);
        $stmt->bindValue(":created_at",$date);
        $stmt->bindValue(":like_count",0);
        $stmt->bindValue(":user_id",$id);
    $stmt->execute();
    header("Location: index.php");
}
