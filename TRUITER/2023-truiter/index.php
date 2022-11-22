<?php
session_start();

    $pdo = new PDO("mysql:host=localhost; dbname=truiter", "root");

use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
//use App\FlashMessage;


require ('src/App/Twitter.php');
require ('src/App/User.php');
require ('src/App/Tweet.php');
require ('src/App/Media.php');
require ('src/App/Video.php');
require ('src/App/Photo.php');
//require ('src/App/FlashMessage.php');





$twitter = new Twitter();

$user = new User('Bart Simpson', 'bart');

$twitter->addUser($user);

// fem un delay de 4 segons perquè les dates de creació no coincidisquen
$userH = new User('Homer Simpson', 'homerj');

$twitter->addUser($userH);

$stmt = $pdo->prepare("SELECT * FROM user");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$users = $stmt->fetchAll();


$tweet = new Tweet('Hola món!', $user);
$video = new Video('Vídeo 1', 1080, 1024, 25);
$photo = new Photo('Foto 1', 1080, 1024, 'Text alternatiu');
$tweet->addAttachment($video);
$tweet->addAttachment($photo);


try {
    $photo = new Photo('Foto 1', 300, 1024, 'Text alternatiu');
    $tweet->addAttachment($photo);
}
catch (\App\Exceptions\InvalidWidthMediaException $exception) {
    echo $exception->getMessage();
}
catch (Exception $exception) {
    echo "Unexpected error " .  $exception->getMessage();
}

$twitter->addTweet($tweet);
$twitter->LikeTweet($user, $tweet);
$twitter->LikeTweet($userH, $tweet);

$tweet = new Tweet("Kids, just because I don’t care doesn’t mean I’m not listening.", $userH);
$twitter->addTweet($tweet);

$tweet = new Tweet("I’ve learned that life is one crushing defeat after another until you just wish Flanders was dead.", $userH);
$twitter->addTweet($tweet);
$stmt = $pdo->prepare("SELECT * FROM tweet");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$tweets = $stmt->fetchAll();

//var_dump($tweets);
require 'views/index.view.php';

