<?php
use App\Photo;
use App\Tweet;
use App\Twitter;
use App\User;
use App\Video;
$tweetText = '';

//$userT = new User($_SESSION['user'],$_SESSION['user']);
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    var_dump($_POST);
    //$tweetText = $_POST['tweetText'];  POST no em retorna res i no trobe el motiu
    echo $tweetText;
}
