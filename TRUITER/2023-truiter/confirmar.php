<?php
session_start();
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root", "root");
$stmt = $pdo->prepare('SELECT id FROM tweet WHERE user_id LIKE :id');
$stmt->bindParam(":id", $_SESSION['id']);
$stmt->execute( );
$numberOfTweets = count($stmt->fetchAll());
require 'views/confirmar.view.php';