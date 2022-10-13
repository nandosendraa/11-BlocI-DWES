<?php
include "src/User.php";
include "src/Tweet.php";
include "src/Media.php";
include "src/Photo.php";
include "src/Video.php";
// index.php
$user = new User('Nando Sendra', 'nandosendra');
// fem un delay de 4 segons perquè les dates de creació no coincidisquen
sleep(4);
$tweet = new Tweet('Hola món!', $user);
$video = new Video('Vídeo 1', 1080, 1024, 25);
$photo = new Photo('Foto 1', 800, 600, 'Text alternatiu');
?>

<h2>Users</h2>
<p><?= $user->getName() ?> (@<?= $user->getUsername() ?>) - Creation
    date: <?= $user->getCreatedAt()->format('d-m-Y h:i:s') ?></p>

<h2>Tweets</h2>
<?php $tweetUser = $tweet->getAuthor() ?>
<p><?= $tweetUser->getName() ?> (@<?= $tweetUser->getUsername() ?>) - Creation
    date: <?= $tweet->getCreatedAt()->format('d-m-Y h:i:s') ?></p>
<p><?=$tweet->getText() ?></p>
<p>Like counter: <?=$tweet->getLikeCount() ?></p>
<hr />

<h2>Media</h2>
<?= $video->getSummary();?>
<br>
<?= $photo->getSummary();?>