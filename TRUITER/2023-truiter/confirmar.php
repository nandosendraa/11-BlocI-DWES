<?php
use App\FlashMessage;
require 'bootstrap.php';
$userId=$_SESSION['user']->getId();
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root","root");
$stmt = $pdo->prepare('SELECT id FROM tweet WHERE user_id LIKE :id');
$stmt->bindValue(":id",$userId);
$stmt->execute( );
$numberOfTweets = count($stmt->fetchAll());
require 'views/confirmar.view.php';