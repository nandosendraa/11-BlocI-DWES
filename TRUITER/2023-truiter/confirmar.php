<?php
session_start();
use App\FlashMessage;
require 'src/App/FlashMessage.php';
$pdo = new PDO("mysql:host=localhost; dbname=truiter", "root");
$stmt = $pdo->prepare('SELECT id FROM tweet WHERE user_id LIKE :id');
$stmt->bindValue(":id",FlashMessage::get('id'));
$stmt->execute( );
$numberOfTweets = count($stmt->fetchAll());
require 'views/confirmar.view.php';