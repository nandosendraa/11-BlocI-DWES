<?php
include "src/Tweet.php";
include "src/Media.php";
include "src/Photo.php";
include "src/Twitter.php";
include "src/User.php";
include "src/Video.php";
$misatge = "";
$twitter = new Twitter();


//Act 430
//if(empty($_COOKIE['iniciat'])) {
//    $misatge = "Benvingut per primera vegada";
//    setcookie('iniciat', (string) time(),time()+ 604800);
//}
//else {
//    setcookie('iniciat', (string) time(),time()+ 604800);
//    $misatge = "La ultima vegada que vas iniciar va ser: ".date('d-m-Y h:i:s',$_COOKIE['iniciat']);
//}

//Act 434
session_start();
//comprovem si es post per saber si s'ha apretat el boto de borrar
if ($_SERVER['REQUEST_METHOD'] === 'POST')
    unset($_SESSION['iniciat']);
<<<<<<< HEAD
=======

>>>>>>> 391f288 (NewTweet)
//comprovem si s'ha iniciat alguna vegada
if (empty($_SESSION['iniciat']))
    $misatge = "Benvingut per primera vegada <br>";
else {
    $misatge = "Ultimes visites :<br><ul>";
    foreach ($_SESSION['iniciat'] as $iniciat) {
        $misatge .= "<li>".date('d-m-Y h:i:s',$iniciat)."</li>" ;
    }
    $misatge .= "</ul>";
}

$_SESSION['iniciat'][] = time();

$user = new User('Bart Simpson', 'bart');
$twitter->addUser($user);

// fem un delay de 4 segons perquè les dates de creació no coincidisquen
//sleep(4);
$userH = new User('Homer Simpson', 'homerj');
$twitter->addUser($userH);

$users = $twitter->getUsers();

//sleep(4);
$tweet = new Tweet('Hola món!', $user);
$video = new Video('Vídeo 1', 1080, 1024, 25);
$photo = new Photo('Foto 1', 1080, 1024, 'Text alternatiu');

$tweet->addAttachment($video);
$tweet->addAttachment($photo);

$twitter->addTweet($tweet);
$twitter->LikeTweet($user, $tweet);
$twitter->LikeTweet($userH, $tweet);

$tweet = new Tweet("Kids, just because I don’t care doesn’t mean I’m not listening.", $userH);
$twitter->addTweet($tweet);

$tweet = new Tweet("I’ve learned that life is one crushing defeat after another until you just wish Flanders was dead.", $userH);
$twitter->addTweet($tweet);

$tweets = $twitter->getTweets();

?>
    <h1>Welcome to Truiter</h1>

    <p><?= $twitter->getNumberOfUsers() ?> users, <?= $twitter->getNumberOfTweets() ?> tweets.</p>
    <h2>Users</h2>
<?php foreach ($users as $user) : ?>
    <p><?= $user->getName() ?> (@<?= $user->getUsername() ?>) - Creation
        date: <?= $user->getCreatedAt()->format('d-m-Y h:i:s') ?></p>
<?php endforeach; ?>

    <h2>Tweets</h2>

<?php foreach ($tweets as $tweet) : ?>

    <?php $tweetUser = $tweet->getAuthor() ?>
    <p><?= $tweetUser->getName() ?> (@<?= $tweetUser->getUsername() ?>) - Creation
        date: <?= $tweet->getCreatedAt()->format('d-m-Y h:i:s') ?></p>
    <blockquote><?= $tweet->getText() ?></blockquote>
    <p>Like counter: <?= $tweet->getLikeCount(); ?></p>
    <?php if (count($tweet->getAttachments()) > 0) : ?>
        <h3>Attachments</h3>
        <ul>
            <?php foreach ($tweet->getAttachments() as $attachment) : ?>
                <li><?= $attachment->getSummary() ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ;?>
    <hr/>
<?php endforeach; ?>
<<<<<<< HEAD
        <h3>Misatges</h3>
        <p><?= $misatge?></p>
=======
    <h3>Misatges</h3>
    <p><?= $misatge?></p>
>>>>>>> 391f288 (NewTweet)
<?php if (!empty($_SESSION['iniciat'])) :?>
    <form action="index.php" method="post">
        <input type="submit" name="borrar" value="Borrar">
    </form>
<<<<<<< HEAD
<?php endif;?>
=======
<?php endif;?>
>>>>>>> 391f288 (NewTweet)
