<?php
use App\FlashMessage;
require 'bootstrap.php';
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$stmt = $pdo->prepare('SELECT id FROM tweet WHERE user_id LIKE :id');
$stmt->bindValue(":id",$_SESSION['user']['id']);
$stmt->execute( );
$numberOfTweets = count($stmt->fetchAll());
require 'views/confirmar.view.php';